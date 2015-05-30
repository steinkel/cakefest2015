<?php

namespace App\Model\Formatter;

use Cake\Routing\Router;

class LinksEnricher
{
    protected $table;

    public function __construct($table)
    {
        $this->table = $table;
    }

    public function __invoke($row)
    {
       $row->_link = Router::url([
            'controller' => $row->source(),
            'action' => 'view',
            'id' => $row->id
        ]);
        return $row;
    }
}
