<?php

namespace Puzzlout\Framework\Dal\Modules;

/**
 * Provides methods to query the database for some generic queries that have
 * nothing to with the database tables.
 * 
 * @author Jeremie Litzler
 * @copyright Copyright (c) 2015
 * @licence http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link https://github.com/Puzzlout/
 * @since Version 1.0.0
 * @package CommonDal
 */
class CommonDal extends \Puzzlout\Framework\Dal\BaseManager {

    /**
     * Gets the list of table names in a database.
     * 
     * @return array The list of table names.
     */
    public function GetListOfTablesInDatabase() {
        $dbConfig = new \Puzzlout\Framework\Dal\DbStatementConfig(null, \Puzzlout\Framework\Dal\DbExecutionType::SHOWTABLES, new \Puzzlout\Framework\Dal\DbQueryFilters());
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
            $dbConfig = new \Puzzlout\Framework\Dal\DbStatementConfig(null, \Puzzlout\Framework\Dal\DbExecutionType::COLUMNMETAS, new \Puzzlout\Framework\Dal\DbQueryFilters());
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
        $dbConfig = new \Puzzlout\Framework\Dal\DbStatementConfig(null, \Puzzlout\Framework\Dal\DbExecutionType::COLUMNNAMES, new \Puzzlout\Framework\Dal\DbQueryFilters());
        $dbConfig->setQuery("DESCRIBE `$tableName`;");
        $this->addDbConfigItem($dbConfig);
        return $this->BindParametersAndExecute();
    }

}
