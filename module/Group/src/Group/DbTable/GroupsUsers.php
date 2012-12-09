<?php

namespace Group\DbTable;

use Eva\Db\TableGateway\TableGateway;
use Zend\Stdlib\Parameters;

class GroupsUsers extends TableGateway
{
    protected $tableName = 'groups_users';

    protected $primaryKey = array(
        'group_id',
        'user_id',
    );
    
    protected $uniqueIndex = array(
        array(
            'group_id',
            'user_id',
        ),
    );

    public function setParameters(Parameters $params)
    {
        if($params->page){
            $this->enableCount();
            $this->page($params->page);
        }

        if($params->group_id){
            $this->where(array('group_id' => $params->group_id));
        }

        if($params->user_id){
            $this->where(array('user_id' => $params->user_id));
        }

        if($params->requestStatus){
            $this->where(array('requestStatus' => $params->requestStatus));
        }

        if ($params->rows) {
            $this->limit((int) $params->rows);
        }

        $orders = array(
            'timeasc' => 'requestTime ASC',
            'timedesc' => 'requestTime DESC',
        );

        return $this;
    }
}
