<?php
// Добавлять в отчет все ошибки PHP (см. список изменений)
error_reporting(E_ALL);

// То же, что и error_reporting(E_ALL);
ini_set('error_reporting', E_ALL);

echo '<pre>';
print_r($_POST);
echo '</pre>';

function echo_var($name){
    if(!empty($_POST[$name])){
        return $_POST[$name];// первый return в цикле- завершает цикл и возв. знач. (до второго return дело не дойдет)
    }
    return'';
};

function output_txt($redirect = false){
    if (empty($_POST['married'])){
        $_POST['married']='off';
    };
    if (!empty($_POST)){
        $out =[];
        foreach($_POST as $key=>$value){
            if (!empty($_POST[$key])){
                switch ($key){
                    case 'FIO':
                        $out []= 'Здравствуйте дорогой '.$_POST[$key].'.';
                        break;
                    case 'age':
                        $out []= 'Мы рады что вы дожили до '.$_POST[$key].' лет.';
                        break;
                    case 'married':
                        if ($_POST[$key]=='on'){
                            $married='';
                        }else{
                            $married=' не ';
                        };
                        $out [] = 'Вам несказанно повезло что вы '.$married.' состоите в браке.';
                        break;
                };
            };
        };
    };
    $out = implode(' ', $out);
    $answer = file_get_contents('answer.txt');
    file_put_contents ('answer.txt', $answer.$out."\n");
    if ($redirect == true){
        header ('location: ?');
    }else{
        echo $out;
    };


};

?>

<?php if (empty($_POST)){ ?>
<form action="" method="post">
    <div class="form form_group">
        <label for="" class="form_label">Имя</label>
        <input type="text" name="FIO" class="form_input" value="<?php echo
        echo_var ('FIO');?>">
    </div>
    <div class="form form_group">
        <label for="" class="form_label">Возраст</label>
        <input type="number" name="age" class="form_input" value="<?php echo
        echo_var ('age');?>">
    </div>
    <div class="form form_group">
        <label for="" class="form_label">
            <?php
            if(!empty($_POST['married']) && $_POST['married'] == 'on'){
                $checked = ' checked';
            }else{
                $checked = '';
            };
            ?>
            <input type="checkbox" name="married" class="form_input"<?php echo $checked; ?>>
            Женат/замужем
        </label>
    </div>
    <button class="form_button">OK</button>
</form>
<?php }else{
output_txt(true);}