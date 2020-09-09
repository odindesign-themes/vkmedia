<?php
/**
 * Vikinger Media - MEDIA GROUP functions
 * 
 * @since 1.0.0
 */

require_once VKMEDIA_PATH . '/includes/classes/VKMedia_Media_Group.php';

/**
 * Creates media table
 * 
 * @return boolean
 */
function vkmedia_create_media_group_table() {
  $Media_Group = new VKMedia_Media_Group();

  // true on success, false on error
  return $Media_Group->createTable();
}

/**
 * Drops media table
 * 
 * @return boolean
 */
function vkmedia_drop_media_group_table() {
  $Media_Group = new VKMedia_Media_Group();

  // true on success, false on error
  return $Media_Group->dropTable();
}

/**
 * Creates media and returns created media id
 * 
 * @param array $media_data   Media data
 * @return int/boolean
 */
function vkmedia_create_media_group($group_data) {
  $Media_Group = new VKMedia_Media_Group();

  // inserted row ID on success, false on error
  return $Media_Group->create($media_data);
}

/**
 * Deletes media group
 * 
 * @param int $media_id   Media id
 * @param int $group_id   Group id
 * @return int/boolean
 */
function vkmedia_delete_media_group($media_id, $group_id) {
  $Media_Group = new VKMedia_Media_Group();

  $media_group_data = [
    'media_id'  => $media_id,
    'group_id'  => $group_id
  ];

  // number of deleted rows on success, false on error
  return $Media_Group->delete($media_group_data);
}

?>