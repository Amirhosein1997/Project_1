<?php
include_once '../functions/functions.php';
include_once '../functions/f-user.php';
?>




    <div style="border: 1px solid;padding: 10px;box-shadow: 5px 5px 8px blue, 10px 10px 8px red, 15px 15px 8px green;margin: 20px;">
        <h5>گزارش گیری از وضعیت کاربران</h5>
        <hr>
        <div class="container" >
            <div class="row">
            <div class="col-md-4">
            <button type="button" class="btn btn-primary btn-block mb-5 ">تعداد کل کاربران سامانه:
                <?php
                echo $users_count=count(users_records());
                ?>
            </button>
            </div>
            <div class="col-md-4">
                <button type="button" class="btn btn-primary btn-block mb-5 ">تعداد کاربران ثبت نامی جدید:
                    <?php
                    echo count(recent_users());
                    ?>
                </button>
            </div>
            <div class="col-md-4">
                <button type="button" class="btn btn-dark btn-block mb-5 ">تاریخ:
                    <?php
                    $date=jdate('Y F j');
                    echo $date;
                    ?>
                </button>
            </div>
            <div class="col-md-4">
                <button type="button" class="btn btn-primary btn-block mb-5 ">تعداد کاربران انلاین:
                    <?php
                    $online_users=online_users();
                    echo count($online_users);
                    ?>
                </button>
           </div>
                <div class="col-md-4">
                    <button type="button" class="btn btn-primary btn-block mb-5 ">تعداد کاربران افلاین:
                        <?php
                        $offline_users=offline_users();
                        echo count($offline_users);
                        ?>
                    </button>
                </div>
                <div class="col-md-4">
                    <button type="button" class="btn btn-dark btn-block mb-5 ">زمان:
                        <?php
                        $time=jdate('H:i:s');
                        echo $time;
                        ?>
                    </button>
                </div>
            </div>
        </div>
        <br>
        <?php
        if (isset($_POST['show'])){
            switch ($_POST['status']){
                case 'online_users':
                    $sess_record=online_users();
                    break;
                case 'offline_users':
                    $sess_record=offline_users();
                    break;
                 case 'day':
                     $sess_record=onedayago_users();
                     break;
            }

        }
        ?>
        <form method="post" enctype="multipart/form-data">
            <label>انتخاب دسته بندی مورد نظر برای نمایش:</label>
            <select name="status" class="form-select">
                <option disabled >__انتخاب دسته بندی</option>
                <option value="day">__گزارش یک روز اخیر تمام کاربران</option>
                <option value="online_users">__گزارش وضعیت کاربران انلاین</option>
                <option value="offline_users">__گزارش وضعیت کاربران افلاین</option>
            </select>
            <button name="show" type="submit" class="btn btn-primary">نمایش</button>
        </form>

        <hr>
        <button type="button" class="btn btn-success" onclick="printpart()">چاپ گزارش</button>
        <button type="button" class="btn btn-info" onclick="window.print()">چاپ صفحه</button>
        <button class="btn btn-info" onClick="window.location.reload();">بروزرسانی</button>
        <div id="my_tbl">
        <table class="table table-dark table-hover" >
            <thead>
            <tr>
                <th>ردیف</th>
                <th>نام و نام خانوادگی</th>
                <th>سمت/مجوز</th>
                <th>اخرین عملیات در سیستم</th>
                <th>اخرین ورود</th>
                <th>گزارش ورود</th>
                <th>وضعیت</th>
            </tr>
            </thead>
            <tbody>
            <?php
                if (isset($_POST['show'])):
                foreach ($sess_record as $key=>$value):
                    $user_tbl_record=sess_to_usertbl($value->title);
            ?>

            <tr>
                <td><?php echo $key+1; ?></td>
                <td><?php echo $user_tbl_record->full_name; ?></td>
                <td>
                    <?php
                    $permition_record=show_permition_name($user_tbl_record->permition);
                    echo $permition_record->name;
                    ?>
                </td>
                <td><?php echo $value->last_activity; ?></td>
                <td><?php echo $value->login_date; ?></td>
                <td> <a href="dashboard.php?page=single-user-log&id=<?php echo $value->id; ?>" class="btn btn-info">گزارش ورود</a></td>
                <td>
                    <?php if ($value->status=='online'):?>
                    <button type="button" class="btn btn-success">online</button>
                    <?php elseif ($value->status=='offline'):?>
                    <button type="button" class="btn btn-danger">offline</button>
                    <?php endif;?>
                        </td>
            </tr>
            <?php endforeach;?>
            <?php endif;?>
            </tbody>
        </table>
        </div>













    </div>
<script>
    function printpart () {
        var prtContent = document.getElementById("my_tbl");
        var WinPrint = window.open('', '', 'left=0,top=0,width=800,height=900,toolbar=0,scrollbars=0,status=0');
        WinPrint.document.write(prtContent.innerHTML);
        WinPrint.document.close();
        WinPrint.focus();
        WinPrint.print();
        WinPrint.close();
    }
</script>

