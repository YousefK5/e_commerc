
                                                                                    <?php
                                                                                    require_once 'connection.php';

                                                                                    if (
                                                                                        isset(
                                                                                            $_GET[
                                                                                                'ad'
                                                                                            ]
                                                                                        )
                                                                                    ) {
                                                                                        $_SESSION[
                                                                                            'userid'
                                                                                        ] = 14;
                                                                                        $qunatity = 1;
                                                                                        $insert = $connect->prepare(
                                                                                            'INSERT INTO cart (quantity,product_id,user_id) VALUES (?,?,?)'
                                                                                        );
                                                                                        $insert->execute(
                                                                                            [
                                                                                                $qunatity,
                                                                                                $_GET[
                                                                                                    'ad'
                                                                                                ],
                                                                                                $_SESSION[
                                                                                                    'userid'
                                                                                                ],
                                                                                            ]
                                                                                        );
                                                                                        if (
                                                                                            $_GET[
                                                                                                'from'
                                                                                            ] ==
                                                                                            'shop'
                                                                                        ) {
                                                                                            header(
                                                                                                'location: ./shop.php'
                                                                                            );
                                                                                        } else {
                                                                                            header(
                                                                                                'location: ./index.php'
                                                                                            );
                                                                                        }
                                                                                    }


?>
