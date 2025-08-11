<?php
session_start();
                            $cn = mysqli_connect('localhost', 'root', '', 'wws');
                            $sql = "Select * from category_user where user_id=".$_SESSION['id'];
                            $result = mysqli_query($cn, $sql);
                            while ($row = mysqli_fetch_array($result)) {
                                echo "<tr>";
                                $sql1="select * from category where category_id=".$row['category_id'];
                                $result1=mysqli_query($cn,$sql1);
                                $row1=mysqli_fetch_array($result1);
                                echo "<td>".($row1['category_name']) . "</td>";
                               echo "<td><a href='#' aria-label='Close' class='category-delete btn-close' data-category-name='" . $row['category_id'] . "'></a></td>";
                                echo "</tr>";
                            }

                            
                            ?>
                            