<?php

namespace WebDevJL\Framework\Dal\Modules;

/**
 * Provides methods to query the database for some generic queries that have
 * nothing to with the database tables.
 * 
 * @author Jeremie Litzler
 * @copyright Copyright (c) 2015
 * @licence http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link https://github.com/WebDevJL/
 * @since Version 1.0.0
 * @package CommonDal
 */
class CommonDal extends \WebDevJL\Framework\Dal\BaseManager {

    /**
     * Gets the list of table names in a database.
     * 
     * @return array The list of table names.
     */
    public function GetListOfTablesInDatabase() {
        $dbConfig = new \WebDevJL\Framework\Dal\DbStatementConfig(NULL, \WebDevJL\Framework\Dal\DbExecutionType::SHOWTABLES, new \WebDevJL\Framework\Dal\DbQueryFilters());
        $dbConfig->setQuery("SHOW TABLES;");
        $this->addDbConfigItem($dbConfig);
        return $this->BindParametersAndExecute();
    }

    /**
     * Gets the list of column metadata for a table.
     *  
     * @param type $tableName The table name.
     * @param type $columnNames The array of columns.
     * @return array The associative array of the metadata of the table columns.
     */
    public function GetTableColumnsMeta($tableName, $columnNames) {
        $tableColumnsMetadata = array();
        foreach ($columnNames as $columnName) {
            $this->setDbConfigList(array());
            $dbConfig = new \WebDevJL\Framework\Dal\DbStatementConfig(NULL, \WebDevJL\Framework\Dal\DbExecutionType::COLUMNMETAS, new \WebDevJL\Framework\Dal\DbQueryFilters());
            $dbConfig->setQuery("SHOW COLUMNS FROM `$tableName` WHERE `Field` = '$columnName';");
            $this->addDbConfigItem($dbConfig);
            $tableColumnsMetadata[$columnName] = $this->BindParametersAndExecute();
        }
        return $tableColumnsMetadata;
    }

    /**
     * Gets the column names for a table.
     * 
     * @param type $tableName The table name
     * @return array The list of column names for a table.
     */
    public function GetTableColumnNames($tableName) {
        $this->setDbConfigList(array());
        $dbConfig = new \WebDevJL\Framework\Dal\DbStatementConfig(NULL, \WebDevJL\Framework\Dal\DbExecutionType::COLUMNNAMES, new \WebDevJL\Framework\Dal\DbQueryFilters());
        $dbConfig->setQuery("DESCRIBE `$tableName`;");
        $this->addDbConfigItem($dbConfig);
        return $this->BindParametersAndExecute();
    }

}
