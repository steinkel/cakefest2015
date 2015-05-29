<?php
namespace App\View\Cell;

use Cake\View\Cell;

/**
 * Totals cell
 */
class TotalsCell extends Cell
{

    /**
     * List of valid options that can be passed into this
     * cell's constructor.
     *
     * @var array
     */
    protected $_validCellOptions = [];

    /**
     * Default display method.
     *
     * @return void
     */
    public function display()
    {
        $this->loadModel('Questions');
        $total = $this->Questions->find();
        $this->set('questionsTotalCount', $total->count());
    }
}
