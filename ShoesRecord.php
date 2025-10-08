<?php

class ShoesRecord
{
    public $Shoes_id;
    public $shoes_name;
    public $price;
    public $model;
    public $colour;
    public $description;
    public $image_link;
    public $errors = [];

    public static function getAll($conn)
    {
        $sql = "SELECT *
                FROM shoes
                ORDER BY Shoes_id;";

        $results = $conn->query($sql);

        return $results->fetchAll(PDO::FETCH_ASSOC);
        }

    function getData($conn, $Shoes_id)
    {
        $sql = "SELECT *
                FROM shoes
                WHERE Shoes_id = ?";

        $stmt = mysqli_prepare($conn, $sql);

        if ($stmt === false) {

            echo mysqli_error($conn);

        } else {

            mysqli_stmt_bind_param($stmt, "i", $Shoes_id);

            if (mysqli_stmt_execute($stmt)) {

                $result = mysqli_stmt_get_result($stmt);

                return mysqli_fetch_array($result, MYSQLI_ASSOC);
            }
        }
    }

    public static function getByID($conn, $Shoes_id,)
    {
        $sql = "SELECT *
                FROM shoes
                WHERE Shoes_id = :Shoes_id";

            $stmt = $conn->prepare($sql);
            $stmt->bindValue(':Shoes_id', $Shoes_id, PDO::PARAM_INT);

            $stmt->setFetchMode(PDO::FETCH_CLASS, 'shoes');

            if ($stmt->execute()) {

                return $stmt->fetch();

            }
        }

        protected function validateData($shoes_name, $price, $model, $description, $colour, $size, $image_link)
    {
        if ($this->shoes_name == '') {
            $this->errors[] = 'Shoe name is required';
        }
        if ($this->price == '') {
            $this->errors[] = 'Price is required';
        }
        if ($this->model == '') {
            $this->errors[] = 'Model is required';
        }
        if ($this->description == '') {
            $this->errors[]= 'Description is required';
        }
        if ($this->colour == '') {
            $this->errors[] = 'Colour is required';
        }
        if ($this->size == '') {
            $this->errors[] = 'Size is required';
        }
        if ($this->image_link == '') {
            $this->errors[]= 'Size is required';
        }

        return empty($this->errors);
    }

    public function delete($conn)
        {
            $sql = "DELETE FROM shoes 
                    WHERE id = :Shoes_id";

            $stmt = $conn->prepare($sql);

            $stmt->bindValue(':Shoes_id', $this->Shoes_id, PDO::PARAM_INT);

            return $stmt->execute();
        }

    public function update($conn)
    {
        if ($this->validateData()) {

            $sql = "UPDATE shoes
                    SET shoes_name = :shoes_name,
                        price = :price,
                        model = :model
                        description = :description
                        colour = :colour
                        size = :size
                        image_link = :image_link
                    WHERE Shoes_id = :Shoes_id";

            $stmt = $conn->prepare($sql);

            $stmt->bindValue(':Shoes_id', $this->Shoes_id, PDO::PARAM_INT);
            $stmt->bindValue(':shoes_name', $this->shoes_name, PDO::PARAM_STR);
            $stmt->bindValue(':price', $this->price, PDO::PARAM_STR);
            $stmt->bindValue(':price', $this->model, PDO::PARAM_STR);
            $stmt->bindValue(':description', $this->description, PDO::PARAM_STR);
            $stmt->bindValue(':colour', $this->colour, PDO::PARAM_STR);
            $stmt->bindValue(':size', $this->size, PDO::PARAM_STR);
            $stmt->bindValue(':image_link', $this->image_link, PDO::PARAM_STR);

            return $stmt->execute();

            } else {
                return false;
        }
    }

    public function create($conn)
    {
        if ($this->validateData()) {

            $sql = "INSERT INTO shoes (Shoes_id, shoes_name, price, model, description, colour, size, image_link)
                    VALUES (:Shoes_id, :shoes_name, :price, :model, :description, :colour, :size, :image_link )";

            $stmt = $conn->prepare($sql);

            $stmt->bindValue(':Shoes_id', $this->Shoes_id, PDO::PARAM_INT);
            $stmt->bindValue(':shoes_name', $this->shoes_name, PDO::PARAM_STR);
            $stmt->bindValue(':price', $this->price, PDO::PARAM_STR);
            $stmt->bindValue(':model', $this->model, PDO::PARAM_STR);
            $stmt->bindValue(':description', $this->description, PDO::PARAM_STR);
            $stmt->bindValue(':colour', $this->colour, PDO::PARAM_STR);
            $stmt->bindValue(':size', $this->size, PDO::PARAM_STR);
            $stmt->bindValue(':image_link', $this->image_link, PDO::PARAM_STR);

            if ($stmt->execute()) {
                $this->Shoes_id = $conn->lastInsertId();
                return true;
            }
            return false;

        } else {
            return false;
        }
    }
}