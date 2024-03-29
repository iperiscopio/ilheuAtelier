<?php

    require_once("config.php");

    class Info extends Config {

        public function getAllInfo() {

            $query = $this->db->prepare("
                SELECT
                    *
                FROM  information
            ");

            $query->execute();

            return $query->fetchAll(PDO::FETCH_ASSOC);
        }


        public function getInfo($id) {

            $query = $this->db->prepare("
                SELECT
                    *
                FROM  information
                WHERE info_id = ?
            ");

            $query->execute([$id]);

            return $query->fetch();
        }

        public function postInfo($info) {

            $query = $this->db->prepare("
                INSERT INTO information
                (title, info, info_en)
                VALUES(?, ?, ?)
            ");

            $query->execute([
                $info["title"],
                $info["info"],
                $info["info_en"]
            ]);

            return $this->db->lastInsertId();
        }

        public function updateInfo($id, $info) {

            $query = $this->db->prepare("
                UPDATE information
                SET 
                    title = ?,
                    info = ?,
                    info_en = ?
                WHERE
                    info_id = ?
            ");

            return $query->execute([
                $info["title"],
                $info["info"],
                $info["info_en"],
                $id
            ]);

        }

        public function deleteInfo($id) {

            $query = $this->db->prepare("
                DELETE FROM information
                WHERE
                    info_id = ?
            ");

            $id = $query->execute([$id]);

            return $id;
        }
    }