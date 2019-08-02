<?php
// mysql
// mysqli
// pdo

$mysql_address = "127.0.0.1";
$mysql_username = "root";
$mysql_password = "root";
$mysql_database = "cms";

$link = ( $GLOBALS[ "___mysqli_ston" ] = mysqli_connect( $mysql_address, $mysql_username, $mysql_password ) );

if ( mysqli_connect_errno() )
{
    $error_message = "Failed to connect to MySQL: " . mysqli_connect_error();
}
mysqli_query( $GLOBALS[ "___mysqli_ston" ], "SET NAMES utf8" );
mysqli_query( $link, "SET NAMES utf8" );
mysqli_query( $link, "SET CHARACTER_SET_database= utf8" );
mysqli_query( $link, "SET CHARACTER_SET_CLIENT= utf8" );
mysqli_query( $link, "SET CHARACTER_SET_RESULTS= utf8" );

if ( ! (bool) mysqli_query( $link, "USE " . $mysql_database ) ) $error_message = 'Database ' . $mysql_database . ' does not exist!';




$sql = "select * from user";

$result_set = [];

$result = mysqli_query( $link, $sql );

if ( ( ( is_object( $link ) ) ? mysqli_error( $link ) : ( ( $___mysqli_res = mysqli_connect_error() ) ? $___mysqli_res : false ) ) )
{
    $error_message = "MySQL ERROR: " . ( ( is_object( $link ) ) ? mysqli_error( $link ) : ( ( $___mysqli_res = mysqli_connect_error() ) ? $___mysqli_res : false ) );

} else
{
    $last_num_rows = @mysqli_num_rows( $result );

    for ( $xx = 0; $xx < @mysqli_num_rows( $result ); $xx ++ )
    {
        $result_set[ $xx ] = mysqli_fetch_assoc( $result );
    }
    if ( isset( $result_set ) )
    {
        var_dump( $result_set );

        return $result_set;
    } else
    {
        $error_message = "result: zero";
    }
}

echo $error_message;