<?php

class VKMedia_Media_Group {
  private $wpdb;

  private $table;

  public function __construct() {
    $table_name = 'vkmedia_media_group';

    global $wpdb;

    $this->wpdb = $wpdb;

    $this->table = $wpdb->prefix . $table_name;
  }

  public function createTable() {
    $sql = "CREATE TABLE IF NOT EXISTS $this->table (
      media_id INT NOT NULL,
      group_id BIGINT(20) NOT NULL,
      PRIMARY KEY (media_id, group_id)
    ) {$this->wpdb->get_charset_collate()};";
    
    return $this->wpdb->query($sql);
  }

  public function dropTable() {
    $sql = "DROP TABLE IF EXISTS $this->table";
  
    return $this->wpdb->query($sql);
  }

  public function create($media_group_data) {
    $format = ['%d', '%d'];

    // number of affected rows on successful insert (always 1), false on error
    $result = $this->wpdb->insert($this->table, $media_group_data, $format);

    if ($result) {
      return $this->wpdb->insert_id;
    }

    return false;
  }

  public function delete($media_group_data) {
    $format = ['%d', '%d'];

    // number of affected rows on successful delete, false on error
    $result = $this->wpdb->delete($this->table, $media_group_data, $format);

    return $result;
  }
}

?>