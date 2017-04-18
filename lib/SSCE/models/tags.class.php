<?php
namespace SSCE\Models;

class Tags extends Base {
	
	public function add($tag, $post) {
		if (!($id = $this->db->selectCell("SELECT id FROM ?_tags WHERE name = ? LIMIT 1;", $tag))) {
			$id = $this->db->query("INSERT INTO ?_tags SET name = ?;", $tag);
		} else {
			$this->db->query("UPDATE LOW_PRIORITY ?_tags SET weight = weight + 1 WHERE id = ?d LIMIT 1;", $id);
		}
		$this->db->query("INSERT INTO ?_articles_tags SET article_id = ?d, tag_id = ?d;", $post, $id);
	}
	
	public function remove($tag, $post) {
		$this->db->query("DELETE FROM ?_articles_tags WHERE article_id = ?d AND tag_id = ?d LIMIT 1;", $post, $tag);
		$this->db->query("UPDATE LOW_PRIORITY ?_tags SET weight = weight - 1 WHERE id = ?d LIMIT 1;", $tag);
	}
	
	public function getList($post) {
		return $this->db->selectCol("SELECT 
										t.id AS ARRAY_KEY, 
										t.name
									FROM 
										?_tags t, 
										?_articles_tags at 
									WHERE 
										at.tag_id = t.id AND at.article_id = ?d
									ORDER BY
										t.weight DESC;", $post);
	}
	
	public function getByName($sTag) {
		return $this->db->selectRow("SELECT * FROM ?_tags WHERE name = ? LIMIT 1;", $sTag);
	}
}
