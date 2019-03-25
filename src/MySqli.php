<?php

namespace Arashinfo\Cpdk;

/**
 * Description of MySqli
 *
 * @author gurjeet
 */
class MySqli {

    public $dbHost, $dbUser, $dbPassword, $dbName, $link, $Result, $error;

    public function __construct($host, $user, $password, $database, $error = true) {
        $this->dbHost = $host;
        $this->dbUser = $user;
        $this->dbPassword = $password;
        $this->dbName = $database;
        $this->error = $error;
        $this->connect();
    }

    public function connect() {
        $this->link = mysqli_connect($this->dbHost, $this->dbUser, $this->dbPassword, $this->dbName);
        if (!$this->link) {
            die("Failed to connect to MySQL: " . mysqli_connect_error());
        }
        return $this->link;
    }

    public function query($query) {

        $this->Result = mysqli_query($this->link, $query);
        if ($this->Result) {
            return $this->Result;
        } else {
            die($this->getError(array('SQL' => $query, 'mysqli_error_list' => mysqli_error_list($this->link), 'Error' => mysqli_error($this->link))));
        }
    }

    public function fetchArray($result) {
        return mysqli_fetch_array($result, MYSQLI_BOTH);
    }

    public function fetchAssoc($result) {
        return mysqli_fetch_array($result, MYSQLI_ASSOC);
    }

    public function numRows($result) {
        return mysqli_num_rows($result);
    }

    public function queryNumRows($query) {
        return mysqli_num_rows(mysqli_query($this->link, $query));
    }

    public function numFields($result) {
        return mysqli_num_fields($result);
    }

    public function add($table, $fileds = array()) {
        $sql = "INSERT INTO `" . $table . "` ";
        $col = '(';
        $values = 'VALUES (';
        $count = count($fileds);
        $x = 1;
        foreach ($fileds as $k => $v) {
            if ($x != $count) {
                $col .= "`" . $k . "`, ";
                $values .= "'" . $v . "', ";
            } else {
                $col .= "`" . $k . "`";
                $values .= "'" . $v . "'";
            }
            $x++;
        }
        $col .= ')';
        $values .= ')';
        $query = $sql . $col . $values;
        $link = $this->connect();
        $result = mysqli_query($link, $query);
        if ($result) {
            return mysqli_insert_id($link);
        } else {
            return $this->getError(array('SQL' => $query, 'mysqli_error_list' => mysqli_error_list($link), 'Error' => mysqli_error($link)));
        }
    }

    public function selectAll($table, $orderBy = NULL, $offset = NULL, $limit = NULL, $where = array()) {
        $query = "select * from `$table` ";

        $count = count($where);
        if ($count > 0) {
            $x = 1;
            $query .= ' WHERE(';
            foreach ($where as $k => $v) {

                $query .= " `$k`='$v' ";
                if ($count != $x) {
                    $query .= " OR ";
                }
                $x++;
            }
            $query .= ') ';
        }
        if ($orderBy != NULL) {
            $query .= "order by `$orderBy` ";
        }
        if ($offset != NULL || $limit != NULL) {
            $query .= " LIMIT $offset, $limit";
        }

        return $this->query($query);
    }

    public function selectFildes($table, $fileds = array(), $orderBy = NULL, $offset = NULL, $limit = NULL) {
        $query = "select * from `$table` ";
        if ($orderBy != NULL) {
            $query .= "order by `$orderBy` ";
        }
        if ($offset != NULL || $limit != NULL) {
            $query .= " LIMIT $offset, $limit";
        }

        return $this->query($query);
    }

    public function update($table, $fileds = array(), $where = array()) {
        $query = "UPDATE `$table` SET ";
        $count = count($fileds);
        if ($count > 0) {
            $x = 1;

            foreach ($fileds as $k => $v) {
                if ($count != $x) {
                    $query .= " `$k`='$v', ";
                } else {
                    $query .= " `$k`='$v' ";
                }
                $x++;
            }
        }

        $count = count($where);
        if ($count > 0) {
            $x = 1;
            $query .= ' WHERE(';
            foreach ($where as $k => $v) {

                $query .= " `$k`='$v' ";
                if ($count != $x) {
                    $query .= " OR ";
                }
                $x++;
            }
            $query .= ') ';
        }

        return $this->query($query);
    }

    public function getError($array = array()) {
        $table = '';
        $list = '';
        if ($this->error == true) {
            error_reporting(E_ALL ^ E_DEPRECATED);
            $table .= '<table border=1>';
            foreach ($array as $k => $v) {
                if (is_array($v)) {
                    foreach ($v as $key => $val) {
                        $list .= "<b>$key</b>" . json_encode($val) . "<br>";
                    }
                    $table .= "<tr><th>$k</th><td>$list</td></tr>";
                } else {
                    $table .= "<tr><th>$k</th><td>$v</td></tr>";
                }
            }
            $table .= '</table>';
        } else {
            error_reporting(0);
        }
        echo $table;
    }

    public function paginationQuery($query, $page = 1, $records = 20, $path = '') {
        $return = array();
        $start = ($page - 1) * $records;
        $query = $query;
        $firstResult = mysqli_query($thia->link, $query) or die($this->getError(array('SQL' => $query, 'mysqli_error_list' => mysqli_error_list($link), 'Error' => mysqli_error($link))));
        $numRow = $this->numRows($firstResult);

        $query = $query . " LIMIT $start, $records";
        $result = mysqli_query($thia->link, $query) or die($this->getError(array('SQL' => $query, 'mysqli_error_list' => mysqli_error_list($link), 'Error' => mysqli_error($link))));
        $return['result'] = $result;
        $return['pagination'] = $this->paginationHtml($numRow, $page, $records);
        return $return;
    }

    public function paginationHtml($numrows, $pageNum, $rowsPerPage, $path = '') {
        $maxPage = ceil($numrows / $rowsPerPage);
        $self = $_SERVER['PHP_SELF'];
        $nav = '';
        $kolpage = $maxPage;
        $lastfive = $pageNum - 5;
        if ($pageNum <= 5) {
            $lastfive = 1;
        }
        $kolpage = $pageNum + 5;
        if ($kolpage >= $maxPage) {
            $kolpage = $maxPage;
        }
        for ($page = $lastfive; $page <= $kolpage; $page++) {//for
            if ($page == $pageNum) {
                $cpage = $page;
                $nav .= " <li class=\"active\" ><a href='#'>$page<span class=\"sr-only\">(current)</span></a></li> "; // no need to create a link to current page
            } else {
                $nav .= "<li> <a href='$self?s=$page'>$page</a></li> ";
            }
        }//for
        // plus 'first page' and 'last page' link
        // print 'previous' link only if we're not
        // on page one
        if ($pageNum > 1) {
            $page = $pageNum - 1;
            $prev = " <li><a href='$self?s=$page'>&lt;</a></li> ";
            $first = " <li><a href='$self?s=1'>&lt;&lt;</a></li> ";
        } else {
            $prev = '';       // we're on page one, don't enable 'previous' link
            $first = ''; // nor 'first page' link
        }
        // print 'next' link only if we're not
        // on the last page
        if ($pageNum < $maxPage) {
            $page = $pageNum + 1;
            $next = " <li><a href='$self?s=$page'>&gt;</a></li> ";
            $last = " <li><a href='$self?s=$maxPage'>&gt;&gt;</a></li> ";
        } else {
            $next = '';      // we're on the last page, don't enable 'next' link
            $last = ''; // nor 'last page' link
        }

        return "<nav><ul class='pagination'>" . $first . $prev . $nav . $next . $last . "</ul></nav>";
    }

}