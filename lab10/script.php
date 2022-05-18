<? $path = GetCWD() . "/loadfiles";

if (!file_exists($path))
    die("<b>Пожалуйста, создайте папку <font color=red>" .
        $path . "</font> и <a href=&#63;>
        повторите попытку загрузить файл</a>.</b>");

if (empty($_FILES['UserFile']['tmp_name']))
    echo "<form method=post enctype=multipart/form-data> 
            Выберите файл: <input type=file name=UserFile> 
            <br>Если существует файл с таким же именем на сервере, Вы хотите его заменить? 
            <select name=confirm>
                <option value=1>Да</option> 
                <option value=0>Нет</option> 
            </select> 
            <input type=submit value=Отправить> 
         </form>";

elseif (!is_uploaded_file($_FILES['UserFile']['tmp_name']))
    die("<b><font color=red>Файл не был загружен! 
            Попробуйте <a href=&#63;>повторить попытку</a>!</font></b>");
else {
    $confirm = $_POST['confirm'];

    if (@fopen($path . "/" . $_FILES['UserFile']['name'], "r") && $confirm == 0)
        die("Такой файл уже существует! <a href=&#63;>Загрузить заново</a>");

    if (@!copy($_FILES['UserFile']['tmp_name'], $path . chr(47) . $_FILES['UserFile']['name']))
        die("<b><font color=red>Файл не был загружен! Попробуйте <a href=&#63;>повторить попытку</a>!</font></b>");

    else
        echo "<center><b>Файл \"<font color=red>" . $_FILES['UserFile']['name'] . "\"</font> успешно загружен на сервер!</font></b></center>"
            . "<hr>" . "Тип файла: <b>" . $_FILES['UserFile']['type'] . "</b><br>" .
            "Размер файла: <b>" . round($_FILES['UserFile']['size'] / 1024, 2) . " кб.</b>" .
            "<hr><center><a href=&#63;>Загрузить ещё один файл! </a></center>";
} ?>