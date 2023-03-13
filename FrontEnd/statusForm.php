<?php
require_once ('../BackEnd/db.php');

if($_SESSION==null){
    header("Location:../FrontEnd/login.php");
}
$StudentEditID=$_GET['StatusID'];
if($StudentEditID==null)
{
    header("Location: ../FrontEnd/dashboard.php");
}
$sqlSex="select * from tblsex";
$resultSex=mysqli_query($conn,$sqlSex);
$sqlNationality="select * from tblnationality";
$resultNationality=mysqli_query($conn,$sqlNationality);
$sqlCountry="select * from tblcountry";
$resultCountry=mysqli_query($conn,$sqlCountry);
$sqlFaculty ="select * from tblfaculty";
$resultFaculty=mysqli_query($conn,$sqlFaculty);
$sqlOccupation="select * from tbloccupation";
$resultOccupation=mysqli_query($conn,$sqlOccupation);
$Nationality_array=array();
$Country_array=array();
$Occupation_array=array();
while($nationality=mysqli_fetch_assoc($resultNationality)){
    $Nationality_array[]=$nationality;
}
while($occupation=mysqli_fetch_assoc($resultOccupation)){
    $Occupation_array[]=$occupation;
}
while($country=mysqli_fetch_assoc($resultCountry)){
    $Country_array[]=$country;
}
$StudentEditQuery="select * from tblstudentInfo where StudentID=$StudentEditID";
$StudentEditResult=mysqli_query($conn,$StudentEditQuery);
$FamilyEditQuery="select * from tblfamiltybackground where FamilyBackgroundID=$StudentEditID";
$FamilyEditResult=mysqli_query($conn,$FamilyEditQuery);
$EducationEditQuery="select * from tbleducationalbackground where EducationalBackgroundID=$StudentEditID";
$EducationEditResult=mysqli_query($conn,$EducationEditQuery);
$ProgramEditQuery="select * from tblprogram where ProgramID=$StudentEditID";
$ProgramEditResult=mysqli_query($conn,$ProgramEditQuery);
if($_SESSION['role']!=1){
    ?>
    <style>
        #AccountSetting{display: none}
        #AddUser{display: none}
    </style><?php }?>
<!DOCTYPE html>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<style type="text/css">
    #regiration_form fieldset:not(:first-of-type) {
        display: none;
    }
</style>
<html
        lang="en"
        class="light-style layout-menu-fixed"
        dir="ltr"
        data-theme="theme-default"
        data-assets-path="../assets/"
        data-template="vertical-menu-template-free"
>

<head>
    <meta charset="utf-8" />
    <meta
            name="viewport"
            content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>Approve Status Information</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon"
          href="https://belteigroup.com.kh/images/beltei_international_university_in_cambodia.png"/>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
            href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
            rel="stylesheet"
    />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="../assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="../assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="../assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="../assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="../assets/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="../assets/js/config.js"></script>
</head>

<body>
<!-- Layout wrapper -->
<div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->

        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
            <div class="app-brand demo">
                <a href="../index.php" class="app-brand-link">
                    <a class="navbar-brand" href="../index.php"><img style="width: 15%" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAMwAAAD3CAMAAABmQUuuAAABgFBMVEUwUaAAr+/tMjf////+/v74wTX5x08ZSaT8wzEAre+2mWfJpF74xDXsJTf1njYAq+5WxtVPx+b/xyoPU6YrT6EAqO4lTaIiTKPjND8Arvj/yiP5yDUArvURR6VKvfILRqYyt/EAQ6f/wh+sk27uuz1qbY3SqlXot0OFfIKX1fb/zB7csE0AP6mxlms8V5x0c4mThHvOp1jxvTrW7vtTYZW5m2ZGW5nBn2Hp9vyijXOZiHhaZZOh2fdrxfNBWZt8d4Zub4zF5fnhs0mmj3GMgH8AOqtZZJN7y/Td8fvX3OqciXex3/i5wdrGzeFYb66luZpPstSHtrHE6ez3tDXygDalsNCQncb5ylx6i7z968jBvH7jv1Nes8xzztvvUzfzjTb2qjV40uqi3vDPvW5merP85LT725iapsu4u4favl+DtrWauKO/u4HxczbwZDayupD+9+j603wAMq+guZ2u4efuSzfNvXJ1tcJXs8/zhjZnzen60HUAJpH72pX84q798txJocIuAAAgAElEQVR4nO2diXviyJnwIZJGkumE6fqE9FltIU6J+wYJc9hgbLCxPd1O7PEcvUl7POPMkZ3MxpmeTXaSf33fkgwIdCBsT55v9/kqme4GJFE/vXdViQp8QP2vaR8E/j/M/5vNhGH+F7QZDDMsbv0Pb8UhM4MJxen/4S0eWsDQgf/hjf4lYQTucedxjzzvCTC8JNFe3ypwyZbL5wLv3iFJEo7cznNuHJxjnPB4GD6tMqGA+7dy7XJOc7ykQDfLbjS8xqTK1aG0QUe4ksLkG/iCj4bhSiiVF2uuMMJB7oRXnC4pJNNMyqW3koJCNbHseJ5bk1RKQeiIewKMcEJVDkbUgeDyOR1qdipNh0/5US70H3k6QPMBbvVjrp/bCrWrubS7Gtoa1xF3k5khXPHxMHwmp1SZobu+7OVE1HcQnHAQ2ttVJFnZj/d3V41OYEK7Sq2yvifC/Ey4AWqIUvFdfYLNtCSab3lY8v5J3+lTro9EscNVEcozIlo1dY4WJJvAHC6erJZmZ+KOSA3ceTsMb14Ku9UHfFoI8MZngum+eN74Vj4gGL4XnIlxCu4Db54hSPAJL9CGVdL4kNlp+LjAXknOl3kqdLg7lOG1JBmfGKfCd3Hzm250xfR8vGT6+YeD+jmxSQv0A/5DR+wwdKaN/5a1DidVqhwf4LlQu7CvyRwn76aaDSlAj0AN+Ea+UyhW6BJ83hxideEbTZpOD1u4N0U1WRICUrIMf4RCEt/QBLhwJW7epn34BvqoCAmHBreXbuXzI5rj+FApwMnNg3hL6ZceDkzSAXkLG5A8Ug/ginC1hsDRod14uqkVdnH3hL6SKewexJ1g6DJCuRZHJ5Go7OYYqiOkGYRqIsMkuTz8iYp0GiGRayAGDeEfJakMn6NUiy/VEEqKDMoIjRQ+cDc+ElFK3hfFMldD4l4DIQZ3kmsx8A1wtNgJITEZr4hwKfWIziOxLSkiGjKMqGGRcA04sLQL78hCCC4MV6Y1JGoBFaHhqFlu4+7RGYS7h6gRb4PhM9DFYhyuM2T2K6MUChXyyaJ4MGKYQD5U0eB72zUF7RZquwpTboon8gHSDooqShVCeUapZPLwL6ZYURAlZpg8Kssao24lh9SwMMzDjcC3S1HRVlzLU9peSk1xZWq3nYJ8d1etqfRJaJdSR5RqhC86D2fw0J90o8aEtDxCpf2aypSUUBUxYjWwW8Hdo9oaGiWRKjhJRt0KVUfxjraVlkDphyF5Xy10tkIjIZ5PNeNw0/tVLSlLqc6JliwXBClfrcjxPU1sJdtN0O+4lirU1IPDMtAroYosofSh1i6GjiStuWWYFq3IBVlIFpvcqKl16D0qn44XxebuVqhB72pKuVTKcKYNNZMn8VKoWI4Xh41CPFmhRvvwuVxsbqWVpMSZ3au0T5RkJWO4AxsM6A6DtJaIxAYHKlEtqEweFAiJPNyaphRQDymE2gWmupUXkQpRjkFKOZeheA0hHOukYeEFgyryfogXGbHcV/O15gFiqAJcWDNdTho+biJU3QPdEfAfgXgovSsyVBz+qBUoRBnUEEDFUQA6woPOa/u5ZjGTxp+DH1QKpstpVaUWdAc32Q4jVFCzCF9bofIIe+54SIIvGyabqsgVtxhF3mvHa1UqLwU0NXPEoK1CHi6WEVOhQkilcBYih+IhDRXlg3KAqTLFljJElaI6FANKvmbEfVprIrWg1ahhJjUU9/ebebEh5+MHQ/h7F65Gg8HtGW5QyTOVPpUXA0kVDVsiM5TLKJUqVKsq9ZBAyFpBRaEkqPkLBxhaGeXbh0lUouMZjebkLejkMBSgCwJVkgNUOp4vcRyIp9AEtQVyVS4dNoaHSUXiSrKgSuB2UlK8w/RlNR4QQDwck0ElQTpUW7RUMGGqu8O8VDrstOEdbUQfblXl/S0pIBWq+zRcDDpbSpoKeVgequX/CPWFw06tU94qlVvcYZWmDyugsPSIx90L5EbtlnRYdpKMlC+CBwlUC0I8maRbqapGF+LDEhdimqU0KnMtUYsL0r5SUA5TjLyP1HhbQUcjCICQtwIMl0+F4iMGTEFsxwX5JFmgQgUc01IFiAWqAaOkC+ASm4gW+EK+LOVDrXiVaUhCXG2lqzWuEy9kihiGr+SHlaKSUkrl/FBNCYXRbl9jNAgQKM5Le1vQPaXZAhVKCSHVvPQqTLtZSVdQNRnKdYQRYrRCCnQ6LVIiV02pwyJihpUTNIrnq5CnKtjZIW2EDiqogWHkhsioh6k80wRTqo6SuY7URJRWDCEmNNqtGX0UiiifioP2qyPwfXRaVHJ72POPlFThBKWSCO5nxfBNeQaNhBx8PWiAoikH4t6+yKTicHS+XDG6h7Q4KjFoX6zVnGzmBMEXqOAqURXCIyhkoQZXkyDzCBQZhjI/Skl8BkcHBjUkDcJCm2JESMN4VZI0sIc8wygtyrwGJNd4oAEZ/xkely8DGQ0HwjviCd2Hq2Qqxos9oYUoBk4Uj7iHOFORk+CR+wgTQj9oBb5bVuCfSHnonpKimAJczAEGDsi15TYcHBJwgpLaldsiJXCSogoNiGoQtCFiQcelA/AgakfgSilwPqFcKA6SoeIBWQnJZVHco0FsqAp2zHcgxlGjEATWhpnPSCrOiqUD+JIkmEpIrAWkMriRCnTvQKzRiliVHpIuMc3JSYbm+yGFo7C85GGVDghVEeU53D1ISY/A5Qlx/LZDOsO34Gj6qCSZaRRYWgPfUB7yjVILu4h+yyjrBO6oJeMr0g0Osqn93T4n7LbhLMiUWpB5cFLj4Rpy6wiyx1JDmue5Rnoq0C0juaKPjDzuSDBUC1+sMct4+RK+GzjlaQ/zoQMcKwzhSn3zYrh70Cv4sj7tmJuZtaO1Cp//k1v+aPYPnJGe5BDipFEuw7sd6HDFpb8sL7jVA2kNZzMo11j96sXVA84wj2l0taWECpDWtddn749o0nB3r5XR8g3O+7hngtGodgVcliI/+hJeTcpTIj0Co/uXwEASjbOg/C8iF9xJkQEfLq4bs3mmcTO+pQ3ztiL42ZqQDnB8w6kIX2rPNQiIx65+IbkYl+f8DA1uBPNL3Xif7VlhwJs/BQcX609oPP+sakYjKL8e3RmhNDyQH30zOLlMrfX7G8Dw+5BBnTz29kpQe0Ii9Miz6T6Uyvl1g7YbwAhFnC3WMvIGw42zxtNbcCcSOHN8hHAEIYmYBIXWWc0GMNIw8f330B+1vDGO1Ekxia+Dn1MJlO9v6jR5qUKhBPUesus13+sfBpL5xOfb0R8BJ5/eCIenIX9P/GWb3Ql+CmefbHZyfC8FZ3+0s/0Fcp5UWDT/MHwGJdggu/36681wwHRrKKG+3g5C234PwlHTkl9d4+U9FVA+je0Ed94kqDXZkn8YqGS+wB1itz//DOPs+8KBSkAxbiwbNNpO8I9wcsifkxekDEb5wrgR7OsE6nif5R9GTiW+3TE6xG6/xzjqiF7XJU5qQfqZ+Dpqnmi07df45GJg7bk0d1IzUcwbsZ1al5T7huFaKPH64fZi6XydgAIy2ZI95i15uYNRUu+32aClsdvfUICz1ZfcRcsJchpq2kTix9fzk3f+mFjjnH3D8CPE7Fh79PrTBNa2SkBy4uF4mh/lAaX2ZnsnuNJ2dr7Fbrq6L9FOPLwgNw5SGOX7qOU+sO8T6JkkMzMZC07so1oC5JPfbci0wFsKUoGWA5kQFIeJz77ZsaGYpvMtlk6tmKYl66k8D6/3iyom+exNcGdJpMEEcp3b2gxmYTLWO/wexIP1rXqw1+BlCZosl9KjrSEydORzu1QW537zNT6VUeBUwXJq3ji19v1r27nbn6Gkp2j8wnB9lPiJtXWJ3WHff0fhTuHqLKWqas34JyB+8Sa4bT/BirMd/ctnCfNcaunUzz76aXvHfu7ORwnvaWi/MDjKON9ldmf79ZvvcK/m7cUXH33OugvFemrsmz+unvo+5kQSNI3G0wX6hYHc6uttp28wO7WzvRP96f2bN9+++eb969i2S2+cmnHq53DqG3xq0PvUNUbjFwYSs4+8bzXLAhM01jfHxqeuMxrfNoMS7zfv5TO3ne+9I41PGD6NEk/pBsuGw5FIGBobfoToZld5n2A8bcEfjNBGqqvJrOsCIES7dZLU9fpg2s2Oe9EY+0DGbkYWS6C0hwvwCUOH0HfrvZMTSCQ2nurk5P7th9Devr2/v7+40HUS0CaDgUG2weW2a+jEw2h8wsi1xJsNYQyBZAckeXH/oWN7i9EuLoixf+HsfIq8b7kfGFyYOYRM1wYGEuxNJ6RuCmTRfzuSPtjgujvfJlIeNY0VRvo/rq28gf2HIw8CsXX9hiD05bffktmIf5Yg+1MCBdx7Kc1hXvzm/7q3/2Q+823/dZtAFjQXOgFtMvv8LRENb8ACLfHq3z26+ZsXc5hf/8qt/fo3jG/7jxETuPsuNBjABNIvbj6814Mbuuntz178zqubvmB+i2wps2tjY+PuYALuykHRZkD3BlB9ExUz2s53jOc99wPzq1eJzze4h0aIDEbHhgQm985M9wRB9jaNn+ABfvtUmH97lYht+LXBcIx8++Hbm/uZVt3fvF1mIYkPiQ0tJsh+nnjlfst9wfz6T69ebBz/Y8Si82/vLyYkIBmqZ7w9Id7qxIf3001pYolX//ZEmN8z7vm/SwuTNuWCIHmhG0xgUW8ngEYSm+rZdu3Vn9z76QvmD+j7TeN/9sLVneG4f69H62QkPN4kmTFgvmB+/0SY326czET0uYLput2v3evhCMBs6plxFYD+8DSYX73YyJnhFiNxny/IerYXi8V6kBLoNxbhkOFgGMNs3PAg7dNg/voqsaE6sD3Qsnsyi9P8oOGrI9EBMc84dfDJj4OBhMbdnfmC+fdXLoMZri2cvYcUMmwVJxsOTh+cwtsJYKyBCbv4OS935gfm17975T8ze+h59p4c2/oajumGW5jgYOkNE8kOnD/dRq/+9CSY3zM/biwZoud0ayNdbEsk/sgLJhybEM4XgOyM+U/XjvqB2dwzB2POXQlGxsSHbwdrYCJdiEUk6fjZzqfu2ZkvmE3SzFlz837hHnmfZb1gQBkxCkkMnO7HzkfuvtkXDPWcw0zhHmHklxEXmEjWEAvAEE75IPhm11TTlzd7tZiZeRYa48+g7lSZhYN1E4UkyJjTl7LvEy+eAvPXR+TM6xrbIy8uyOxqd0EJZywT51Eo9rV7oPEDs3mYWd/CRoZArLz7YPmGwbh5B49A4wMGCoDaYwcA3RrbI0AyOrEkGpadqRhJTF3d9k7i1b8/AeZ3G4xm+GzhKWGY+MRiNVDNzVm67vHUowjwA/N75otnh5mY3tdSakZ6xJzFa/wJoqbbmIYfmN8wnz67zUQnRjG9GAQAcyFnLPZEyNJ23CsaXzCbJwDrWyQWjcYic5bwwMLiWUt7DND4gfkD+svzwwStSQIbnPhlweXZU2B+a59nfmaqhwRmrb0YMH9xzWf8wFCJb35RGDZK+mfxGjrzB2OkZqDkZjPqpvmraNR88ZAkRC2NtbyKmR859C4cJRYsHj55BuOenPmBeWXAsF1i1qZh6ytIsbLmm5iFsDTsbWcty8aMt+wsvTmKV6xcwHzjOgrgDwYPZ7BZAgcGfBeJLjt/9QBDWmHMEEKQkd7iIIj1cJA9UQ6PLSx+Bp89Mk0/uZmZNOPuE4NeD2I3oUeMV/Ws0WJWGB0a7h7+G8MQ+tg4KOoME8laWCZ+xjcB5tXzwHQj4QjuYPjhldHMjx5GWvFrAzcSCeMMDO62eVDQCWaJRfdVZ+Dh5meSzHgM0Q2qK+PVZAptkGWtMEE8yoxhgmY6SejGQVPWCWaJxblMtsP89BSYvy5gTJvB6YbFZuphL5iHgzCFDcbKQhJRfwXg88IYHWcX/VgDYzY9bIdZZlkT+JdgXFRoMxhsJTjzIHrhhc2Eg55qVn84yAazzLI+wPwCMOEIdmfZyMMrc52FlcwOYxxkk0x4icW1sHSEeR4HUO92cVkFOoFf6QOj9cx+YWcMOmdzAOZBq3HGGl+we/TL8nzebBY0Tdc8j4emwhj/nqzCzA4CLbTCWOM+HOIb5blg5gkMOVhKbgyYWdMNGGIOM2+DsDWdYa0s5EarAZ6WAUA6Yy41iZktaBjG7BV+Y+VFcPa39f2Y9W3ILa0s2U1mNgHm6bnZMzaccz7K+HF7YqL5rKOzRiMfafwGzNNKgOcuzsL6kpJtOFr6xErzmcvmyGSJZdNVGh5TtP4GNNYsnN2MZbDE4qMcW4F52ujMsw41WcbHDIPZeJLWYyWArxFN5GMWkA0Hyel6jVkK/ACzKcqTRzT/077YxNbr8LhO+Eji2egyy8bLmgDmxZPGmv/0KrUCE+tFcH5pmRrXiQnhZ1UP+TSDgcY+aRbAPj+DkxG8Qjk7jho84ciADGZ9LOpZccobRhjzu6OJV399Aox95ixG1OsTY4ESTkXCU0gwgz4Es+zINo4wJox7nul3TnNlHXC4TvSM6iU6hWqgR2R1wsdwxFIFs1Jbgs76g/FaPONztnk1BYiQD+oemUwiAx0KNoJcd5+XM+WHQbIwC4krXgLZHTjOx9phnjp1bp8GCENfzH9M6hhs6scvLbPgwRi8nEbHPmFycXND+lpstPOj+4IzXzBOs01Zc0ooXCenUI5M169QWjZ+PIwQidbJm5cvSf2l0cjFOnpD59iHJVHLbfuDV66Lgf0tBHrhMKmJHSu455iOF2Jl10a/yHSZZRrp6fo7YNDJi79hlr8txmbDPbIbifQm+hTkvTKD7uGZn7BEKwJRsp7Fz2Gw2BzWBMzVyK9HIvV3pkCmWQL//c5cUYPFMSYGgx45eXdDZGORAcS0hXfwWgbge/Gc0xKNcRZHfeOfsXU2E1tiAZj6lKwbMH8jewOMRcZwj6d6PRurE/o9ltq7+7oONkVOuoOZPT19JaBLRRNmI3UyPIPBjy5FHJTcPHTFYO5fvru5ucEsN8RLXb95+W4ymUYhEIEjgKBVv39pbe9u5jO5T1+j6bZGCyKMGSvAICK9AQSbSc95cc+Kwejzfg7ghR4j3+nRCTkBM6mT74ibl7Z2MYPxWm72pHXNbJCYRPCjfJExMdHNQSjHdCvcW1Gym3eTC/Oek0FyQoa74BCjg3C2fk8Sk1WQ+wu4+AzGy/59rp518ADhSHBMksFIbJzt1glysSDBaXhi1WBAglOz0zck8fJmYsx4RHQSbPBiBeVvxHQAgWzG4rXe1P+DDSsJTQwr1SBohH59uas22UTqy0o2mfYiLPugTe9A5UhjrAlPutk1DGJpl5x/98636MkPNtjWArJQL0axwySykRWDIFcXV654ZcgvsZtgY+TMvMmucQL4d/AKL/XJy5ubdwsakOMimkKZ+eRHTiAHWFk+A6nm2Jgai63cd9JWPq565e7DFNvMC8zgwzjHIS4I4p4g54ZzA27QMt65k/B4FMAvzJ9eMSslTRcUfxrrEnaWFbNZHowx5kMfboepUzf12f0xRgcICDDk3HAmWC4LFu8nTvzajN1oIMbU8RDywMayPAm2kveDYOq9h4doceC/udHn1IP6Sx3PNLxbWA52khalhZTZw2T8woDR2IabwpHxeFAnnGAmC9GsKtkgQpLTHtYsdqz/7R5uxsM0U3hgyuOGeAfFEYTRC+zKYjHdsoh2+7MX7s9o+If5vdMCOlxRZUknmnlyY9NCDEGYWVA4S9axnZjLAcNzGxq8I8Y6JKBgMFHIYReVAS6Z3R8F8q9mrg9qsezUTjMXDbvqycaGI+sNTGFEdQiHD2MBcxjIzKYRfZIdTHS8kMaqZd96JGYbwEB65vYIjWUJn100KywPkPMsGHIH4uaexDbOTifvTI98QYA8ILwQenccsVrq9tdejnkDmN+4P6m1PNti9tosTlZGMByGMMI9HZsJ9r6R7EA3zGYCbGwED5PoYF6WxzViXrnMBjA4o3Et8lkHmqjD+w4DOOz4wgjzeDCUjfRwIH33ID4wN+zcyJnrXqtl/mFAz9znAlaD/MNC/shK4k9ah2NmfxuV2UPNHBncYMHM7ppOdKOWBAAyZi9ftgmMoz+btVV9MtIAW4ixPCzPjh8GY8IDo3YxB9DDk3dY6WYDChG2B7mn/sCGi0wvX7YBDPZnXk8E2GCyYRfrfxDIrI9B8m84DQibZABDkLPIwmbhs5uLh3sAdZlXxNwI5te/ZTxmNlZ9ME5bVhNQ6zABGyUflC5C4lyTfbjKxcv7QX0mwYiZixKme2YZ93GZjWF+9wp5SGYlBcNKZYv9S/TBuWSgu7MBwDBxoy/cV7h+AUXc3/TIeBLGE7NeedlmMDg/83ha0+7RVuFcToxOXi4e2GbHA4vPDA/q4K71HlSqMWz+63q4AQyEGq9fOHFIn5dYXMbVQbMmlnUAyw8BhsNQkk/DUG9Edz5fZ/6bSeav3gsC7MFmCcblTHZ87z0aChl2jKiHoSxzH5Z5BMyv/+D5vLanaAjbcz+zvvbWL81ks4Zf9oz+m8LgLMDDOzvkARb7ce1wZLB+zokNbn/KrPHLm8KAd/Z6+MTm0CwwXj8u42POCQvGo15+DMw60fTcYB4xQ77ctn/0IZgNYdaJxqlQMwXziNlLS/MnmA1hsGg8HBqbdYZ5umC+9iOYTWHAoXk+f+YC81TBvPfhyjaHwemmxxKnsNNYDRYMHo/BP+CCf98M4iL+D6rNMJ5JCJo/DRbEqwrgPZY1AucS/U5qfYx5DAwcz3jcQkfvTIy74/E00u0Zq1Phv+hgMA12s5FBNDLtBgfTwXTcjYwHUxYfNQ5nB+GYNauBosx16v9JMPgnKP7oUdfoDqMbZESfTonxpNvV9W6XGGd7kIR2J0SU6EUJItYlJ5CB4fn3QZbo1qcRghhHCcuYTCzhOcD0BBhInj3cs5MLILIA0wXKbqRej3QJvY5XCAfxoggQk96FTyODyVSPdPWsTujTMTmtxyxrUCGR8a6WHw+D3bOXD3CAYbFk6nDXI5M6FDnZ7BiEMtanA7NKiOiDiCEZctDVxwT+WTSiRwxmiraDrf+XgvnVv6HEX1xp7C4APzgANpONTHvhbDbcm06n0SmbBaTgFDLiGFjPOAwfjwddttcFm5mCJY3hqJnVMGtTfzuM54+1Lf0kWhG5K5otCyAmQeOHMk0/xZqz++DIsPMyZpGND2bejDXXnRiOb65kTMlfxyw/1uZ/+wk6xXzg6p6XswDCHEkOm244PPO6BkjQfELA/JM1Oj9/GZ6tpdl5k0AZv7+//5i9NPgj5O7RwtZliw9zK+FBNjiJhrP1yCAbjsK/BuCWu/C6PsHVZD3LsuNJPcrG8EfwZjQ46cFhQWN0man63gfmURuD0G2UeO8mG8uwP1E35y4iZDdI9MJTMO5pGLwuAIeN1+MsOIfBlAhHwODHLPZhY3ALMTjAHPzfURn3nWGfByYg55mE25KMeSFAzB8gncGAezZg2CAxJfH4a30Qjuh4VIrt1cFRAAwbzuLCMzIxCqDtTxNogy1cHwfDBShXs5mFGsv0XbhODogYwPQIAwZPInZZLKkBBh2QLAtCq0cwDNvFDz+EBzg3xQZzssGeCI/cf4bvoMSPbmZDWFXMbNkuiKM3jox7bCyLH6bFf/TAPwfD4x68w8a6WXyY8REedu5BNbfz0yYG83iYAF1BiY+caQw9W3nsylyGYi5RMscujT8MP2a+YMOzd81D4dgYw6Q22qvi0TsDyRpyyZ9Z/DSN5+8T+GvsBwyzdsuZ54ExnMDnjjQxYuPf+nRoUJCh9GY7vDwehhNUJvHaiSai+1tu6c3yI0TLDTdEecIGVFyJYhhnB/0MLH9MoPYmO54/ESbAtxiGegYhOLF8n0BbG+8A96StwfijX4hm+6ME0uKbdueJ+5wJHQQ0z/6bFFguoUfszOcEs4E7xDSMoxdwa+bvHXpKE7NsFCw5cwtxJxiuIfjfz0zoMAzyR2PGSTyXOe51PVz39nebyYXnW1vmbk4OMHSVKTZ8b0QkNCiIN66VZzQWC+NfDMG/mwn/jmX1IFSRMdLlV/aC+Bd/wF78snABmq/0c+KeGwzeJDanlDjeHw/fqjGJNy40bL1O9ohefVrvReq6PomRRr0fnQ7c5p6CXydQ0ScLJ+B9i5n+kWg6cQcYqYqEMgh6r+GxdY+VJgDR83tnmhgZzWYnenYQgSR5EOlOu2RsMBlESd15UmYnlsLbbfki4aVSEXFNhtlL19xguD7Kx2lUjWui4nOTKVpBiS8cN/Rg8QiZPphkcQ05hSJyOunp9WwUl2IOh29/jhi05ytWcq1MFQ1TKfmIQopCu8AIB6iGKOoI8uJhTt3jfeBwchMlVCcXzcYiwXAsGI3gDLkXjQVjUTCjXiQWdUpEt98kGKbjJ0IIdCOdU5B22GwJJRVtucBwcSp1WEEtQarVDhuoKWUCPq4uVxCTeO+gatMuqBY0/Ksg3XmDf9qnBdmdTxOMWlp/87hAqU3lAzm5KuItxji6lopzTjBcJ48q8YBYlDJiqF0MtWUVFUvraeg0hQ3H1sNIthvpDQbRSISNZOvj8ABqy24vOBjYpst2Yp9BeFkfFHi6RO8xaCQN6bSYNDZLbqOtFucEcxRCTHMoZgpDKp9r7TfkkLHpNLfuhvGBIUp8Zlc1kgxO61kSIgs7jRFZkM+AzEbH09Vf/Nx+j3faW5/C0OkkU5FBfWQ6IKvGpid0VUztO8GA0AInKlOMd8RiOh8X+IYYKnBQJmfWbbfIyUW7qrFZfdLtDqC47+FHbaKgXtPIIBvpTlaWr+58l2Co9HqF5jO5oZpLSwdimQ8IFXFE4x3e07KjmuFeCZIUb4qow5VO9uIhEW9k3UBiM+C4KZml4S0zE58upSphEpxxlyCz2XqYJUg9SpIQcLJjQl962nb7dSqBlMCa63M0zUmprcPDvZYQQHkZeooQdmSziOiaaJ7URCWPSi1j43GaSo4QSr2HntsAABARSURBVO6viaNCII8StaV0AA/MsmFzgNKYVDIHYZcewGIhScbRxfvinNwJKel4ntKUYT4NgaNB87vMgbWwdoUR5MwQjg+JRzyWSEFDJ7k23sTc8wvju6Bqf2Q3yqO3X6sJpDbWqJh0pORSCAXSxv5hKNBCqQMhICztfudRAvBSXxDR8JCuZngwneoh6hRRW1izo11riDfy9P9TlewO3nC06O3FQMG0HNovjPD29uV0qyNmKjllf1UtPesZjmtpIsMM+YCsiC06xO8hkams2UNUPgHh/Bj0KZztz8FaUh3PoI8VjEtvgYfdQn1hpHbi5Vyn4ZBsWWEcUiJO6mspnpPSoiYFaDlFCcWcRnt7ArqFNzh84739nNl2Ynjj1KRnDoh35MyJKY5mVFXMQydUMZcDSdpFyckLGLXs1EvsQoSkikoc9oQH5bJa4dQ9z1SQk0fg1j77aZ2usTvf4n0fPa2Fk0qKOEy3tLJ0gjRNRMlMq5ZuOZzCS4GROoOhVAppacf9MfktVCtxHE3VGLFf7ch5cbjOrWkPm616oGy/T0FsGXk6Mb6RLzeZ4SFD8zQNeVY6JTItwe5UeZob5XOqSs3VrJDWxFo74CB0uqSBiNpipq3JNN9AeVzZeflpTuoMjd1aXXHMvWybnIc/4WihlBM7haRYRMm4Avmfti9l7K6CE+RyNZc6aBWsDgDoR8NcFcRjPz5AMyh1mAnsc+AMGnCAcNLxKkd5eYQ3KP7G2XR2Yt8ZGuZh+PCVTYrmmDLPQVlAxVGjLDIjexLPS60ig7aOQKdWvRkvN5piquKwuyzXCon5Sojh9rEzwK5DrLa8TFfg8dbR6ns7zk4QR8lU2UPDOLq1J0JhJeUPBPpA3Iunxcxe22bTkK3s5XPKnkQ75mZYuJUaSto3vDXcChUoqObO1nIVVVtK2nOvvr6xne5Pyzg77F9QAlEVry1o6X5T1MAraoVklQ7wlNpGVNm2MzlHc20KJUuzKznGGdDBfE5r2bSIk/dbewpqGyIEb13gh2JR9oh3nHSUt27wG3zYfxYxB17BVyhpGRUlZTovbu2nICZAtNu1SQX0S8upGcsWuC5Bk5ePqrnqkU0PeD6tiiN8WTmPvTXDJLVQy6MaBX7sCWab/O7svKHMjY7dz6Clco5pFYagAJIiagiSFrVtkwovp5UceFbrV7tmADhc5vId2yAABBE8rkOXxSItNRVmF1Q74FUfzDbFjm6zO9vf1LALK7kLk6cbGtNJi0cC/gLIPBDeedoBpTwUm/0V3fFIZzi6tJXLpx2kg4ejVAZcQi4t7uW3JFXUvDZh5uVMygg771VA0bx205YzSdBLSAIVyRQ9WKZ9n0bjggec7TreuRkdKGLpOHg2BC4tXg11xDaSlHwGXo48khzw03hzbLwxuN0S5w2CoZprFkYv8mIFNYR9KKEg7bANCgjSiAITcojuzjDzIhlwtpxwIIKmWkkxkEFUm27ER2KS0fb27PHJ0gNwkUg58gpNbeagFQpJEpVREFWV4kMR2U0LLkRRlYXeWaOuIwx3e1maGbWBo9iHawV5n0KtXUTRYF41qqCc7EJ88vBRAr1rV1lLA5eFWkIr16IrtUMNoVZLLNrG8AEFMiBp9i0cT5+fnnt7M/rs+Oz8biZHsB0tV7WrBy+dcEWxAs5mJO5K7U4GKYg5od2Nx21bdM78YnD2W7RU1WiJyRwmc1DhrhqFIINURgv50+d3p6eXd4vXjmqm310fX12el2Y4Uj+U0+w+SBBGEAW4eA3EI8RTVCGQCu0PRxtMIuAmdzTzeDD5AN/JQXZe2yrs2SaaebAVQJlbAF86uzq9urs7PveEOb8+vj0+g//3Z2pjRP8te3TgQcnSW2hXwMPt+XYoWeQoEWktfu3Q1MPtgMNSomoOzPFlMSnFaxnwYEV+NY0FD0ZZFAw6eXd6dnl5fnZd8lYz/vr0+pI8vT4+Jy/5GY7cyYtOcZvfRXjYR84zzVyjAZquVSjUaO3Ra0Y/ONC6UjED0q2pD8Nlsoo6R2JZSNvuGqDUmMoMBd8p/vTy8ur4/NaqBc5qdn7OC6Wz68uzO5Bk/EHXIZiraNcWv8AUihU+0BGbjWFBoItio5AW22mEMi2BxqW3AwgvCFznZF9Ii6jPSQciVPNYRnwaibk8bTN7iLupxTdz/PnVpRDg9BIIZelQCwykWkuXAPM6vry6PTub+wu4aI0Z2ZMCgRcOcigT59sncQqF9hSxXKihAw0PhR3hElXgoQEXHhiWIB6Vk8l0Du0JaYYZylxJDEm0YpRIrRP7HABE+xQ6md9E4fzquH8MMP3V+8QXtHmlSUFpumS6HB+/jB+fAxG3uPCIqe05THQIkJqmIJ8GtacQU5TTTKrZEpM0h5AstNujvf0K12j1+ZamKmkaIXGvg+J8h9oFM5GqKFAY7gqBxezkEoq6GBOCzOZSOL07v7tcHf/mJS4Toqg5DIOo4tFy4OMD16dnOr5ZM9uBcIErEXuNJB+FxKMjBckKVaDpLW0YaitxuohQIF5jGCQynRzKlZjaQU3cP2RqDCd2+A4qMSgNed5BO1d0ClEYZWGpPH97fnx1e3l+Ry+zQFWZqSLEWGAMnmFlOefhA7dXWAHuzuL8DKctDtN2HCiEZFWslcBqOJnaVxR1JPTFpniURvGhGsi1KiIUfkdSCdUKSpJRlF26g8QqQwkCElGzYTcuHqx0gcLxEDD6x5fH1/2l74aqOa0xJokB8xVkszMcRjta6qmhmvTZrX7VB3XHn0AN6YgD/igdaozEitwR4yEKQZqolcW90n48NSwcdHbFloriAakqNtrVPbEWkuCwApSjB6pTbDKlMtOIAH17fXWp353eLhccvFRqp+YkTKL2VYAg/vyPDxY8+T1pWejc+TF3fHp2eqVfm+PtOAN1wuFovpXPjVSl0ESKfCQyKVQRQFCKhAXaTyE5ICTFvTQ6DKFU/EisxGvDdkly8Pi4cjjgFuHi9BTC/fX1stWDUKCYnfU78fE//kwQAeMnlf/8FfXAw6DaydK9oo/PIeycAdGl9NBpNxycL+yHxMaBODrMNxttlMSDIVD8Cm2xpKAGBzBlOdenayJo5JALSA5pjoCT/IXZCyWIffrx1d2yg6LpiooWJF+aP3QdmP1E9Cd/n4uHKVryF+76+Pry8vgM4ujlPGUDnKHjFC7kf4KQQQIkDXIDhSDJQhrAHIilEdTaBRUJDYbqpIedRt9pCIET6IqR5M+udn0Gbpg+vV6a84CUMTmzFNAuLBNiGYYgyH8sxGMp5SBeC4HbY3DUV6fCw0UBJymqbok/T/P77WRcRFCaVBBeV7AlNuKKmFdzI2lU3W2BM3WKqHDVA1SbJy4cd357eXvG3y6vS4D8SlsI5Yd/WrYjscBg8Xw8x1ke1eBK19fHBHd8fCXPvphvwxc7FUoGD9aTdLtE54dUhh7lIOZII22rQwOp2ylyQ8sNF66fv7o+uzzjz66vl1ys3KnOhfLBl0u9X4EB6/lhjrNcGgqnx+d3Z6BtcxXEKoEO7ANTFiIwOQkKA2Oexx0jYDjZvXwuNB944IRzMNXT4+tTySpD8Nj5Ocrf/7nSdxsMaNtXzjinxzyo2n8d3x1fz24e9GBo6cGjG3ayxijYzCj560sahHJ1uzTFhccy5ig//9nWcwcYbDyMg7JB7kif3+Ii4pi2XP9IyznGCt/NHC8eZuhFSXh7fXZ1dXVqSfGNr9qboSSofzh02xkG2j+YxAzHWpnBLbsmj3HxxC2+Gk+Cah3HSQQ/JA08XtxYSJe+vjylT3G1YhW4OWxlotS+dO60GwxBfEnNcJYqM47jIQmHUHp2O8fB8UusHbQ25YETWwepXHVvMTQKefZZ//j27PqUX5HKHOWDT9y67A6DcR6UjUkuTT8YxnwFidL5/F2wbTxJ0m7IttzXDYSn5U4ylcuPuMXQAS+AG4aC+PT23NlWID66o3jCYGWb4ZysVGZ9iDv68Z1lpIKXApV8rra1T0vrgDBIKRNiRGVknRLi6Ku7Y5qjj6+4ZansL1BsDsw/zAJndehegOrt7jhA3t0u/B0n4MKCEfMH+7xEO0xyYQyBluTGSEvlUlt47nFxDB84vzr7r7PzW05YRknnfaKshSGImaNGqcySC77Vjy+vj4+vz26t45lwz49OFCaXCrXLLVqWaMhuzEYDBd3frzSHKKc2MyV5aRhUKF1BAnh53b9aCpHcHIVaj+IDhiB/NnEYpFoqM+78VI+fXcH/oBxdSn0hv5JbmaJC5URqWNWKB+2Tk3ayqFWHlJh7kW9WOoK0POTB8/Tp5RVkS1dXSzOMnNxRNkDxA7PICqBAWIxMcvQ5J1zdkbent6enp30HdRIa5crBllZVoAFUe1Ru8JK0mgaAAeGYEj89vbpdzsEsKB4ebFMYwPn7DEdZjD5zeKa2dBY4Lh3f3fHGG8vVE8fzWL3Mhoc2nKzo/Ory9Prs9G5ZKI9B8QtDEP/8eBZ2qsujzwJ3d3mmYz3jS+Tx9SaRBg+CCVAO315en58v3wb5qLoxin8YK05oBad/jeOocErGj2dp5/qnXyA8Xt9d8vzV3Wngeln1eItUav5RNoGBAuGDOc7yYLoxIsvpYMSnUKhjp7xqRKsknHALmWvgOA4R/zywgpJ+HMpmMIBTc5EOngzRoSQFl6TfXfbPT09XZMMvAiFPn1/f3p3KYPGXl6szBJYk3z0Hex4Ya8pWXR7JAT2HXFc/Pj89Pj07vroykh5+VlGCDs4KB/7u7BIi1PXV5fmVcB5YaoKUWWTGm6JsDmPFUVZGNSCDAxSjwj7DXeevrs7BskscVwpcX1/OBt/Al1+eHt+dllbmC/AyhNQjFeyxMFac4eowAETM80u9dKzjcUcBquxjDHd2BqF1VgWBPp5eQtW1ksDhJfHMIzzYU2GsOKldW2Em0JBTGyOGkBycnd2enp1C/Xumzx/ScXhywhwFm5X2j0N5LIwVh9lq2epmM3iWQOcIyLiO7870/vGqS7AcTXPzUTAf6eTzwxiOelZcz5bjrLb4scCXSqVb+I+zz+7MFNMyXswkfnAo7f8FMEsDU1Sx4VBncrfGWx4rbIxacz4Kxnz1FJSnwUBW8MNilHp40rfxeC+MBZKT4Wy82D4K9q+GwaPUzEw8kFSftHzWzUbVfDC0jHzbR8H+9TCERdswj1osC5JjlWmRCK6atZqFpPYPcv33rG/PAGMVD+ZB+WQ5IOO6eVXpzDKnU9FSyDKvwvz8DEIx2rPAQPvkh0Ri3j8ASlWTo3QJCmfJLGckKJpL6cxBSAUOZkGS+OGxQcWhPRcMYUyKzHlMIsTUhvlqCJqSV2vGG4zliATznCTEs8JA++RnKmHprsE0a9TS24nEB189l3bN2/PCQPvzlz/g5WXLfV/GA5CfP3kWi19pzw6D258/+epj6HLCKhD8b/zWxz9/+ewSmbVfBMZo5D8/+fKrn//+8ccfQPv47z/8/NWXn/zzaRF+XftvM+OU9UgGM20AAAAASUVORK5CYII="> <span class="app-brand-text demo menu-text fw-bolder ms-2 mt-3 text-capitalize">Beltei</span></img></a>
                </a>

                <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
                    <i class="bx bx-chevron-left bx-sm align-middle"></i>
                </a>
            </div>

          <div class="menu-inner-shadow"></div>

          <ul class="menu-inner py-1">


            <li class="menu-header small text-uppercase">
              <span class="menu-header-text">Controll</span>
            </li>
            <li class="menu-item">
                  <a href="../FrontEnd/dashboard.php" class="menu-link menu-toggle">
                      <i class="menu-icon tf-icons bx bx-book"></i>
                      <div data-i18n="Authentications">Dashboard</div>
                  </a>
                  <ul class="menu-sub">
                      <li class="menu-item active">
                          <a href="../FrontEnd/dashboard.php" class="menu-link" target="_self">
                              <div data-i18n="Basic">Admin Dashboard</div>
                          </a>
                      </li>
                  </ul>
              </li>
            <li class="menu-item" id="AccountSetting">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-dock-top"></i>
                <div data-i18n="Account Settings">Account Settings</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="pages-account-settings-account.html" class="menu-link">
                    <div data-i18n="Account">Account</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="pages-account-settings-notifications.html" class="menu-link">
                    <div data-i18n="Notifications">Notifications</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="pages-account-settings-connections.html" class="menu-link">
                    <div data-i18n="Connections">Connections</div>
                  </a>
                </li>
              </ul>
            </li>
            <li class="menu-item" id="AddUser">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-lock-open-alt"></i>
                <div data-i18n="Authentications">Authentications</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="auth-login-basic.html" class="menu-link" target="_blank">
                    <div data-i18n="Basic">Login</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="register.php" class="menu-link" target="_blank">
                    <div data-i18n="Basic">Register</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="auth-forgot-password-basic.html" class="menu-link" target="_blank">
                    <div data-i18n="Basic">Forgot Password</div>
                  </a>
                </li>
              </ul>
            </li>
              <li class="menu-item">
                  <a href="javascript:void(0);" class="menu-link menu-toggle">
                      <i class="menu-icon tf-icons bx bx-user"></i>
                      <div data-i18n="Authentications">Student</div>
                  </a>
                  <ul class="menu-sub">
                      <li class="menu-item active">
                          <a href="#" class="menu-link" target="_self">
                              <div data-i18n="Basic">All Student</div>
                          </a>
                      </li>
                      <li class="menu-item">
                          <a href="Active.php" class="menu-link" target="_self">
                              <div data-i18n="Basic">Active</div>
                          </a>
                      </li>
                      <li class="menu-item">
                          <a href="Pending.php" class="menu-link" target="_self">
                              <div data-i18n="Basic">Pending</div>
                          </a>
                      </li>
                      <li class="menu-item">
                          <a href="Disable.php" class="menu-link" target="_self">
                              <div data-i18n="Basic">Disable</div>
                          </a>
                      </li>
                  </ul>
              </li>

              <li class="menu-item">
                  <a href="javascript:void(0);" class="menu-link menu-toggle">
                      <i class="menu-icon tf-icons bx bx-book"></i>
                      <div data-i18n="Authentications">Function</div>
                  </a>
                  <ul class="menu-sub">
                      <li class="menu-item active">
                          <a href="#" class="menu-link" target="_self">
                              <div data-i18n="Basic">Admin Function</div>
                          </a>
                      </li>
                      <li class="menu-item">
                          <a href="ApplyForm.php" class="menu-link" target="_self">
                              <div data-i18n="Basic">Apply Form</div>
                          </a>
                      </li>
                      <li class="menu-item">
                          <a href="#" class="menu-link" target="_self">
                              <div data-i18n="Basic">View All Record</div>
                          </a>
                      </li>
                      <li class="menu-item">
                          <a href="#" class="menu-link" target="_self">
                              <div data-i18n="Basic">Report</div>
                          </a>
                      </li>
                  </ul>
              </li>
            <!-- Misc -->

          </ul>
        </aside>
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->

          <nav
            class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
            id="layout-navbar"
          >
            <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
              <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                <i class="bx bx-menu bx-sm"></i>
              </a>
            </div>

            <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
              <!-- Search -->
              <!-- <div class="navbar-nav align-items-center">
                <div class="nav-item d-flex align-items-center">
                  <i class="bx bx-search fs-4 lh-0"></i>
                  <input
                    type="text"
                    class="form-control border-0 shadow-none"
                    placeholder="Search..."
                    aria-label="Search..."
                  />
                </div>
              </div> -->
              <!-- /Search -->

              <ul class="navbar-nav flex-row align-items-center ms-auto">
                <!-- User -->
                <li class="nav-item navbar-dropdown dropdown-user dropdown">
                  <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                    <div class="avatar avatar-online">
                      <img src="../BackEnd/images/<?php echo $_SESSION['image']?>" alt class="w-px-40 h-auto rounded-circle" />
                    </div>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                      <a class="dropdown-item" href="#">
                        <div class="d-flex">
                          <div class="flex-shrink-0 me-3">
                            <div class="avatar avatar-online">
                              <img src="../BackEnd/images/<?php echo $_SESSION['image']?>" alt class="w-px-40 h-auto rounded-circle" />
                            </div>
                          </div>
                          <div class="flex-grow-1">
                            <span class="fw-semibold d-block"><?php echo $_SESSION['name'] ?></span>
                            <small class="text-muted"><?php if($_SESSION['role']==1) {echo "Admin";} else{echo "User";}?></small>
                          </div>
                        </div>
                      </a>
                    </li>
                    <li>
                      <div class="dropdown-divider"></div>
                    </li>
                    <li>
                      <a class="dropdown-item" href="#">
                        <i class="bx bx-user me-2"></i>
                        <span class="align-middle">My Profile</span>
                      </a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="#">
                        <i class="bx bx-cog me-2"></i>
                        <span class="align-middle">Settings</span>
                      </a>
                    </li>
                    <li>
                    </li>
                    <li>
                      <div class="dropdown-divider"></div>
                    </li>
                    <li>
                      <a class="dropdown-item" href="../BackEnd/logout.php">
                        <i class="bx bx-power-off me-2"></i>
                        <span class="align-middle">Log Out</span>
                      </a>
                    </li>
                  </ul>
                </li>
                <!--/ User -->
              </ul>
            </div>
          </nav>

            <!-- / Navbar -->

            <!-- Content wrapper -->
            <div class="content-wrapper">
                <!-- Content -->

                <div class="container-xxl flex-grow-1 container-p-y">
                    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Approve Status Information</h4>

                    <!-- Bootstrap Table with Header - Light -->
                    <?php if($StudentEditRow=mysqli_fetch_assoc($StudentEditResult)){?>
                    <div class="card-body">
                        <div class="d-flex align-items-start align-items-sm-center gap-4">
                            <img
                                    src="../BackEnd/images/<?php echo $StudentEditRow['Photo'] ?>"
                                    alt="user-avatar"
                                    class="d-block rounded"
                                    height="200"
                                    width="200"
                                    style="object-fit: contain"
                                    id="uploadedAvatar"
                            />
                        </div>
                    </div>
                    <hr class="my-0" />
                    <div class="card-body">
                        <form  action="../BackEnd/status.php" enctype="multipart/form-data" method="post">
                            <!-- Form Student Infomation Done-->
                            <fieldset>
                                <h2> Personnel Details</h2>
                                        <input hidden="hidden" name="StudentID" value="<?php echo $StudentEditRow['StudentID'] ?>">
                                <div class="row mb-2 ">
                                    <div class="col-lg-6">
                                        <label class="col col-form-label" for="basic-icon-default-company">Name Latin: </label>
                                        <label class="col col-form-label" for="basic-icon-default-company"><strong><?php echo $StudentEditRow['NameInLatin']?></strong></label>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="col col-form-label" for="basic-icon-default-company">Name In Khmer: </label>
                                        <label class="col col-form-label" for="basic-icon-default-company"><strong><?php echo $StudentEditRow['NameInKHmer']?></strong></label>
                                    </div>
                                </div>
                                <div class="row mb-2 ">
                                    <div class="col-lg-6">
                                        <label class="col col-form-label" for="basic-icon-default-company">Family Name: </label>
                                        <label class="col col-form-label" for="basic-icon-default-company"><strong><?php echo $StudentEditRow['FamilyName']?></strong></label>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="col col-form-label" for="basic-icon-default-company">Given Name: </label>
                                        <label class="col col-form-label" for="basic-icon-default-company"><strong><?php echo $StudentEditRow['GivenName']?></strong></label>
                                    </div>
                                </div>

                                <div class="row mb-2 ">
                                    <div class="col-lg-6">
                                        <label class="col col-form-label" for="basic-icon-default-company">Sex: </label>
                                        <label class="col col-form-label" for="basic-icon-default-company"><strong>
                                        <?php 
                                           while ($rowSex= mysqli_fetch_assoc($resultSex)){
                                            if($StudentEditRow['SexID']== $rowSex['SexID']){$gender=$rowSex['SexEN'];}
                                        }   echo $gender;
                                           ?>
                                        
                                        </strong></label>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="col col-form-label" for="basic-icon-default-company">PassportNO ID: </label>
                                        <label class="col col-form-label" for="basic-icon-default-company"><strong><?php echo $StudentEditRow['IDPassportNo']?></strong></label>
                                    </div>
                                </div>

                                <div class="row mb-2 ">
                                    <div class="col-lg-6">
                                        <label class="col col-form-label" for="basic-icon-default-company">Nationality: </label>
                                        <label class="col col-form-label" for="basic-icon-default-company"><strong>
                                        <?php 
                                           foreach ($Nationality_array as $nationality){
                                            if($StudentEditRow['NationalityID']==$nationality['NationalityID']){$nationalityShow=$nationality['NationalityEN'];}
                                        }
                                        echo $nationalityShow;
                                           ?>
                                        
                                        </strong></label>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="col col-form-label" for="basic-icon-default-company">Country: </label>
                                        <label class="col col-form-label" for="basic-icon-default-company"><strong>
                                            <?php 
                                                foreach ($Country_array as $country){
                                                    if($StudentEditRow['CountryID']==$country['CountryID']){$CountryShow=$country['CountryEN'];}
                                                }
                                                echo $CountryShow;
                                            ?>
                                        </strong></label>
                                    </div>
                                </div>

                                <div class="row mb-2 ">
                                    <div class="col-lg-6">
                                        <label class="col col-form-label" for="basic-icon-default-company">Date Of Birth: </label>
                                        <label class="col col-form-label" for="basic-icon-default-company"><strong>
                                   
                                         <?php echo $StudentEditRow['DOB']?>
                                     
                                        
                                        </strong></label>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="col col-form-label" for="basic-icon-default-company">Place Of Birth: </label>
                                        <label class="col col-form-label" for="basic-icon-default-company"><strong>
                                            <?php 
                                              echo $StudentEditRow['POB']
                                            ?>
                                        </strong></label>
                                    </div>
                                </div>

                                <div class="row mb-2 ">
                                    <div class="col-lg-6">
                                        <label class="col col-form-label" for="basic-icon-default-company">Email: </label>
                                        <label class="col col-form-label" for="basic-icon-default-company"><strong>
                                   
                                         <?php echo $StudentEditRow['Email']?>
                                     
                                        
                                        </strong></label>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="col col-form-label" for="basic-icon-default-company">Phone Number: </label>
                                        <label class="col col-form-label" for="basic-icon-default-company"><strong>
                                            <?php 
                                              echo $StudentEditRow['PhoneNumber']
                                            ?>
                                        </strong></label>
                                    </div>
                                </div>

                                <div class="row mb-2 ">
                                    <div class="col-lg-6">
                                        <label class="col col-form-label" for="basic-icon-default-company">Current Address: </label>
                                        <label class="col col-form-label" for="basic-icon-default-company"><strong>
                                   
                                         <?php echo $StudentEditRow['CurrentAddress']?>
                                     
                                        
                                        </strong></label>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="col col-form-label" for="basic-icon-default-company">Current Address PP(Optional): </label>
                                        <label class="col col-form-label" for="basic-icon-default-company"><strong>
                                            <?php 
                                              echo $StudentEditRow['CurrentAddressPP']
                                            ?>
                                        </strong></label>
                                    </div>
                                </div>
                                <div class="col-lg-6" style="display: none">
                                    <label class="col col-form-label" for="basic-icon-default-company">Current Address PP(Optional): </label>
                                    <label class="col col-form-label" for="basic-icon-default-company"><strong>
                                            <input type="hidden" value="  <?php
                                            echo $StudentEditRow['StudentID'];
                                            ?>" name="ID">
                                        </strong></label>
                                </div>
                                <?php }?>
                                <!--button-->
                                <input type="submit" name="submit" class="next btn btn-danger" value="Disable" />
                                <input type="submit" name="submit" class="next btn btn-success" value="Approve" />

                            <!--Form 5-->

                    </div>
                    <!-- Bootstrap Table with Header - Light -->
                    <!-- Content wrapper -->
                    </form>
                </div>
                <!-- / Layout page -->
            </div>

            <!-- Overlay -->
            <div class="layout-overlay layout-menu-toggle"></div>
        </div>
        <!-- Core JS -->
        <!-- build:js assets/vendor/js/core.js -->
        <script src="../assets/vendor/libs/jquery/jquery.js"></script>
        <script src="../assets/vendor/libs/popper/popper.js"></script>
        <script src="../assets/vendor/js/bootstrap.js"></script>
        <script src="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

        <script src="../assets/vendor/js/menu.js"></script>
        <!-- endbuild -->

        <!-- Vendors JS -->

        <!-- Main JS -->
        <script src="../assets/js/main.js"></script>

        <!-- Page JS -->

        <!-- Place this tag in your head or just before your close body tag. -->
        <script async defer src="https://buttons.github.io/buttons.js"></script>
</body>
</html>
