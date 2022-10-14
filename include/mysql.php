<?php



global $mysql_conn;
try {
    $mysql_conn = mysqli_connect("localhost", "root", "", "vsics");
} catch (Exception $err) {
    $mysql_conn = false;
    // echo $err;
}

if (!$mysql_conn) throw_response(5000, "Api is down.");






/**
 * It takes a SQL query as a parameter, and returns the result of the query.
 * 
 * @param sql The SQL query to execute.
 * 
 * @return The result of the query.
 */

function query($sql)
{
    global $mysql_conn;
    return mysqli_query($mysql_conn, $sql);
}



/**
 * It fetches all the data from the database and returns an associative array
 * 
 * @param sql the sql query to be executed
 * @param error a function that will be called if there's an error.
 * 
 * @return An array of associative arrays.
 */

function fetch_all_data($sql, $error = null)
{
    global $mysql_conn;
    $res = mysqli_query($mysql_conn, $sql);

    if ($res) {

        if (mysqli_num_rows($res) > 0) {

            $data = [];
            while ($a = mysqli_fetch_assoc($res)) {
                array_push($data, $a);
            }
            // return an associative array
            return $data;
        } else {
            if ($error != null) {
                $error('no record found.');
            }
        }
    } else {
        if ($error != null) {
            $error(mysqli_error($mysql_conn));
        }
    }
}



/**
 * It returns an associative array of the first row of the result set of the query
 * 
 * @param sql The SQL query to execute.
 * @param error This is a callback function that will be called if there's an error.
 * 
 * @return An associative array.
 */
function fetch_data($sql, $error = null)
{
    global $mysql_conn;
    $res = mysqli_query($mysql_conn, $sql);

    if ($res) {

        if (mysqli_num_rows($res) > 0) {

            // return an associative array
            return mysqli_fetch_assoc($res);
        } else {
            if ($error != null) {
                $error('no record found.');
            }
        }
    } else {
        if ($error != null) {
            $error(mysqli_error($mysql_conn));
        }
    }
}



/**
 * If the query returns a row, return true, otherwise return false.
 * 
 * @param sql The SQL query to execute.
 * 
 * @return true if the query returns a row, and false if it doesn't.
 */
function row_exist($sql)
{
    global $mysql_conn;
    $res = mysqli_query($mysql_conn, $sql);
    if (mysqli_num_rows($res) > 0) return true;
    return false;
}