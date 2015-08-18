<?php if ( ! defined( 'ABSPATH' ) ) exit;

class NF_Database_Migrations_Relationships extends NF_Database_Migration
{
    public function __construct()
    {
        parent::__construct(
            'nf_relationships',
            'nf_migration_create_table_relationships'
        );
    }

    public function run()
    {
        $query = "CREATE TABLE IF NOT EXISTS $this->table_name (
            `id` int NOT NULL AUTO_INCREMENT,
            `child_id` int NOT NULL,
            `child_type` tinytext NOT NULL,
            `parent_id` int NOT NULL,
            `parent_type` tinytext NOT NULL,
            UNIQUE KEY (`id`)
        ) $this->charset_collate;";

        dbDelta( $query );
    }

}