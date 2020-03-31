<?php

namespace Mindbreeze;

class Response
{
  public $records = [];

  public $pagination = [
    'prev' => null,
    'next' => null,
    'total' => 0
  ];

  public $suggestion = null;

  public function __construct($encodedQuery, $response)
  {
    $this->encodedQuery = $encodedQuery;
    $this->response = $response;
    $this->parse();
  }

  public function parse()
  {
    $status = $this->response->getStatusCode();

    if ($status !== 200) {
      // $_SESSION['search_qeng'] = null;
      throw new \Mindbreeze\Exceptions\ResponseException('HTTP error', $status);
    }

    $body = $this->response->getBody();

    if (!isset($body->resultset->results)) {
      $_SESSION['search_qeng'] = null;
      return;
    }

    /**
     * Qeng variables are tied to the query term, so keep an encoded version
     * of the query term alongside the qeng variables for validation
     */
    $_SESSION['search_qeng'] = [
      'query' => $this->encodedQuery,
      'vars' => $body->resultset->result_pages->qeng_ids
    ];

    $this->records = $this->getRecords($body);
    $this->pagination = $this->getPagination($body);
    $this->suggestion = $this->getSuggestion($body);
  }

  protected function getRecords($body)
  {
    return array_map(function ($result) {

      $result->data = new \StdClass();

      foreach ($result->properties as $property) {
        $name = preg_replace('/[^A-Za-z0-9_]/', '_', strtolower($property->id));
        $result->data->$name = $property->data[0];
      }

      unset($result->properties);

      return $result;

    }, $body->resultset->results);
  }

  protected function getPagination($body)
  {
    return [
      'prev' => $body->resultset->prev_avail,
      'next' => $body->resultset->next_avail,
      'total' => $body->estimated_count
    ];
  }

  protected function getSuggestion($body)
  {
    $suggestion = null;

    foreach ($body->alternatives as $alt) {

      if ($alt->name != 'query_spelling') {
        continue;
      }

      // found a suggestions. return it.
      foreach ($alt->entries as $entry) {
        $suggestion = strip_tags($entry->html);
        break;
      }

      break;
    }

    return $suggestion;
  }
}
