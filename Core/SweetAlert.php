<?php
namespace Core;
?>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php
require_once 'Interfaces/IAlertable.php'; 
require_once 'Interfaces/IConfirmable.php'; 
require_once 'Interfaces/IPromptable.php'; 

use Core\Interfaces\IAlertable;
use Core\Interfaces\IConfirmable;
use Core\Interfaces\IPromptable;
use Core\Interfaces\ITimerable;

class SweetAlert implements IAlertable, IConfirmable, IPromptable, ITimerable
{

    function __construct(string $txt, string $title = '', string $dataType = 'html', string $type = 'POST')
    {
        $this->txt = $txt;
        $this->title = $title;
        $this->dataType = $dataType;
        $this->type = $type;

    }


    public function alert(string $icon = '', string $iconColor = 'RED', string $confirmButtonColor = 'RED')
    { 
        $iconToLower = strtolower($icon);

        ?>
        <script>
             let txt = "<?php echo $this->txt; ?>";
             let title = "<?php echo $this->title; ?>";

             let iconToLower = "<?php echo $iconToLower; ?>";
             let iconColor = "<?php echo $iconColor; ?>";
             let confirmButtonColor = "<?php echo $confirmButtonColor; ?>";

             Swal.fire({
                icon: iconToLower,
                text: txt,
                iconColor: iconColor,        
                title: title,
                confirmButtonColor: confirmButtonColor
             })
        </script>
        <?php
    }

    public function confirm(string $url, string $icon = '')
    { 
        $iconToLower = strtolower($icon);

        ?>


        <script>
            //from __construct

             let txt = "<?php echo $this->txt; ?>";
             let title = "<?php echo $this->title; ?>";
             let dataType = "<?php echo $this->dataType; ?>";
             let type = "<?php echo $this->type; ?>";

            //from params
             let url = "<?php echo $url; ?>";
             let iconToLower = "<?php echo $iconToLower; ?>";

             Swal.fire({
                title: title,
                text: txt,
                showCancelButton: true,
                icon: iconToLower
            }).then((result) => {                                
                    $.ajax({
                        url: url, //url
                        type: type, //метод отправки
                        dataType: dataType, //формат данных
                        data: "confirm=" + encodeURIComponent(result.value),//result,
                    });                       
            })


        </script>
        <?php
    }

    public function prompt(string $url, string $confirmButtonColor = 'red',
    string $inputType = 'text') 
    {
        ?>
        <script>
            
        //from __construct//
        let title = "<?php echo $this->title; ?>";
        let dataType = "<?php echo $this->dataType; ?>";
        let type = "<?php echo $this->type; ?>";

                        //from params//
        //necessary//
        let url = "<?php echo $url; ?>";
        //optional//
        let confirmButtonColor = "<?php echo $confirmButtonColor; ?>";
        let inputType = "<?php echo $inputType; ?>";

        Swal.fire({
            title: title,
            input: inputType,
            confirmButtonColor: confirmButtonColor,
        }).then((result) => {
            $.ajax({
                url: url, //url
                type: type, //метод отправки
                dataType: dataType, //формат данных
                data: "prompt=" + encodeURIComponent(result.value),//result,
            });       
        })
        </script>
        <?php
    }

    public function bigConfirm(string $url, string $icon = '', $showCancelButton = true, 
    string $confirmButtonColor = 'green', string $cancelButtonColor = 'red', 
    $confirmButtonText = 'confirm', $cancelButtonText = 'cancel', $showResponse = true, 
    $showError = false, string $errorText = 'error!', string $confirmedText = 'confirmed', 
    string $dismissedText = 'dismissed', string $dismissIcon = 'warning', string $confirmIcon = 'success', 
    string $errorIcon = 'warning')
    {
        $iconToLower = strtolower($icon);
        $dismissIconToLower = strtolower($dismissIcon);
        $confirmIconToLower = strtolower($confirmIcon);
        $errorIconToLower = strtolower($errorIcon);

        ?>

        
        <script>
             //from __construct

             let txt = "<?php echo $this->txt; ?>";
             let title = "<?php echo $this->title; ?>";
             let dataType = "<?php echo $this->dataType; ?>";
             let type = "<?php echo $this->type; ?>";

             // from params
             let url = "<?php echo $url; ?>";

             let icon = "<?php echo $iconToLower; ?>";
             let showCancelButton = "<?php echo $showCancelButton; ?>";

             let confirmButtonColor = "<?php echo $confirmButtonColor; ?>";
             let cancelButtonColor = "<?php echo $cancelButtonColor; ?>";

             let confirmButtonText = "<?php echo $confirmButtonText; ?>";
             let cancelButtonText = "<?php echo $cancelButtonText; ?>";

             let showResponse = "<?php echo $showResponse; ?>";
             let showError = "<?php echo $showError; ?>";

             let errorText = "<?php echo $errorText; ?>";

             let confirmedText = "<?php echo $confirmedText; ?>";
             let dismissedText = "<?php echo $dismissedText; ?>";

             let dismissIcon = "<?php echo $dismissIconToLower; ?>";
             let confirmIcon= "<?php echo $confirmIconToLower; ?>";
             let errorIcon = "<?php echo $errorIconToLower; ?>";

            Swal.fire({
                title: title,
                text: txt,
                icon: icon,
                showCancelButton: showCancelButton,
                confirmButtonColor: confirmButtonColor,
                cancelButtonColor: cancelButtonColor,
                confirmButtonText: confirmButtonText,
                cancelButtonText: cancelButtonText
            }).then((result) => {                    
                    $.ajax({
                        url: url, //url
                        type: type, //метод отправки
                        dataType: dataType, //формат данных
                        data: "bigConfirm=" + encodeURIComponent(result.value),//result,
                        success: function(response) { //Данные отправлены успешно
                            if (showResponse) {
                                if (result.isConfirmed)
                                {
                                    Swal.fire({
                                        icon: confirmIcon,
                                        title: confirmedText,
                                        showConfirmButton: false,
                                        timer: 1250
                                    })             
                                }
                                else
                                {
                                    Swal.fire({
                                        icon: dismissIcon,
                                        title: dismissedText,
                                        showConfirmButton: false,
                                        timer: 1250
                                    })   
                                }
                            }
                        },


                        error: function(response) { // Данные не отправлены
                            if (showError) {
                                Swal.fire({
                                    icon: errorIcon,
                                    title: errorText,
                                    showConfirmButton: false,
                                    timer: 1250
                                })  
                            }
                        }


                    });                     
            })
        </script>
        <?php

    }
    
    public function alertTimer($time, $timerProgressBar = true) //time in milliseconds
    {    
        ?>
        <script>
        let txt = "<?php echo $this->txt; ?>";

        Swal.fire({
            text: txt,
            timer: "<?php echo $time; ?>",
            timerProgressBar: "<?php echo $timerProgressBar; ?>",
            didOpen: () => {
                Swal.showLoading()
            },
        })
        </script>
        <?php
    }



    public function alertError(string $iconColor = 'red')
    { 
        ?>
        <script>
             let txt = "<?php echo $this->txt; ?>";
             let title = "<?php echo $this->title; ?>";
             let iconColor = "<?php echo $iconColor; ?>";

             Swal.fire({
                icon: 'error',
                text: txt,
                iconColor: iconColor,               
                title: title,
             })
        </script>
        <?php
    }

    public function alertWarning(string $iconColor = 'red')
    { 
        ?>
        <script>
             let txt = "<?php echo $this->txt; ?>";
             let title = "<?php echo $this->title; ?>";
             let iconColor = "<?php echo $iconColor; ?>";
             Swal.fire({
                icon: 'warning',
                text: txt,
                iconColor: iconColor,               
                title: title,
             })
        </script>
        <?php
    }

    public function alertInfo(string $iconColor = 'red')
    { 
        ?>
        <script>
             let txt = "<?php echo $this->txt; ?>";
             let title = "<?php echo $this->title; ?>";
             let iconColor = "<?php echo $iconColor; ?>";
             Swal.fire({
                icon: 'info',
                text: txt,
                iconColor: iconColor,               
                title: title,
             })
        </script>
        <?php
    }

    public function alertQuestion(string $iconColor = 'red')
    { 
        ?>
        <script>
             let txt = "<?php echo $this->txt; ?>";
             let title = "<?php echo $this->title; ?>";
             let iconColor = "<?php echo $iconColor; ?>";
             Swal.fire({
                icon: 'question',
                text: txt,
                iconColor: iconColor,               
                title: title,
             })
        </script>
        <?php
    }

      


    public function __set($property, $value)
    {
        $this->$property = $value; // устанавливаем значение
    }

}


