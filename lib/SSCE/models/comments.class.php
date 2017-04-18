<?php
namespace SSCE\Models;

class Comments extends Base {
	
	public function isDeleted($id, $state) {
		$this->db->query("UPDATE LOW_PRIORITY ?_comments SET is_deleted = ?d WHERE id = ?d LIMIT 1;", $state ? 1 : 0, $id);
		return $this;
	}
	
	public function addComment($comment, $post, $user) {
			$iId    = $this->db->query("INSERT INTO 
											?_comments 
										SET
											post_id     = ?d,
											user_id     = ?d,
											text        = ?",
										$post,
										$user,
										trim($comment));
            $this->db->query("UPDATE LOW_PRIORITY ?_posts SET comments = comments+1 WHERE id = ?d LIMIT 1;", $post);  
			return $iId;
	}
	
	public function getCommentList($post) {
		return $this->db->select("SELECT 
										c.*,
										u.nickname,
										u.gender,
										u.photo
									FROM 
										?_comments c,
										?_users u
									WHERE
										c.post_id   = ?d AND
										c.user_id   = u.id
									ORDER BY
										c.id;",
									$post);
	}
}
