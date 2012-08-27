<?php

require (LIBS . 'model' . DS . 'datasources' . DS . 'dbo' . DS .
'dbo_postgres.php');

class DboPostgresLog extends DboPostgres {
  function logQuery($sql) {
      $return = parent::logQuery($sql);
      $this->log("<".$this->took.">".$sql, LOG_DEBUG);
      return $return;
  }
}

?> 