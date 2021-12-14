<?php

namespace Core;

?>
        <head>
        <link rel="stylesheet" href="styles/beautifulAlertStyle.css">
        </head>
        <div id="dialogoverlay"></div>
        <div id="dialogbox">
        <div>
        <div id="dialogboxhead"></div>
        <div id="dialogboxbody"></div>
        <div id="dialogboxfoot"></div>
        </div>
        </div>
        
<?php

require_once 'Interfaces/IAlertable.php'; 
require_once 'Interfaces/IConfirmable.php'; 
require_once 'Interfaces/IPromptable.php'; 

use Core\Interfaces\IAlertable;
use Core\Interfaces\IConfirmable;
use Core\Interfaces\IPromptable;

class BeautifulAlert implements IAlertable, IConfirmable, IPromptable
{

    function __construct($txt, $title = 'title',
    string $backgroundOfDialogbox = '#181B2B', string $backgroundOfDialogboxhead = '#000000', 
    string $backgroundOfDialogboxbody = 'rgb(10, 10, 10)', string $backgroundOfDialogboxfoot = '#211818', 
    string $backgroundOfSubmit = '#CCC', string $textColor = '#FFF', 
    string $titleColor = '#FFF', string $submitColor = 'black', $submitWeight = '500',
    string $borderStyle = 'solid', string $borderColor = 'rgb(27, 22, 22)', string $borderRadius = '2px',    
    string $padding = '2px 7px', string $submitHoverColor = 'black', string $submitHoverBackground = '#fff',
    string $submitHoverBorderStyle = 'inset', string $submitHoverBorderColor = 'red', 
    $submitHoverWeight = 'bold',
    string $dataType = 'html', string $type = 'POST')
    {

        $this->txt = $txt;

        $this->title = $title;

        $this->backgroundOfDialogbox = $backgroundOfDialogbox;
        $this->backgroundOfDialogboxhead = $backgroundOfDialogboxhead;               
        $this->backgroundOfDialogboxbody = $backgroundOfDialogboxbody;
        $this->backgroundOfDialogboxfoot = $backgroundOfDialogboxfoot;
        $this->backgroundOfSubmit = $backgroundOfSubmit;

        $this->textColor = $textColor;
        $this->titleColor = $titleColor;
        $this->submitColor = $submitColor;
        $this->submitWeight = $submitWeight;

        $this->borderStyle = $borderStyle;
        $this->borderColor = $borderColor;
        $this->borderRadius = $borderRadius;

        $this->padding = $padding;

        $this->submitHoverColor = $submitHoverColor;
        $this->submitHoverBackground = $submitHoverBackground;

        $this->submitHoverBorderStyle = $submitHoverBorderStyle;
        $this->submitHoverBorderColor = $submitHoverBorderColor;

        $this->submitHoverWeight = $submitHoverWeight;

        $this->dataType = $dataType;
        $this->type = $type;
    }

    public function alert()
    { 
        ?>
        <script>

            var txt = "<?php echo $this->txt; ?>";
            var title = "<?php echo $this->title; ?>";

            var backgroundOfDialogbox = "<?php echo $this->backgroundOfDialogbox; ?>";
            var backgroundOfDialogboxhead = "<?php echo $this->backgroundOfDialogboxhead; ?>";
            var backgroundOfDialogboxbody = "<?php echo $this->backgroundOfDialogboxbody; ?>";
            var backgroundOfDialogboxfoot = "<?php echo $this->backgroundOfDialogboxfoot; ?>";
            var backgroundOfSubmit = "<?php echo $this->backgroundOfSubmit; ?>";

            var textColor = "<?php echo $this->textColor; ?>";
            var titleColor = "<?php echo $this->titleColor; ?>";
            var submitColor = "<?php echo $this->submitColor; ?>";
            var submitWeight = "<?php echo $this->submitWeight; ?>";

            var borderStyle = "<?php echo $this->borderStyle; ?>";
            var borderColor = "<?php echo $this->borderColor; ?>";
            var borderRadius = "<?php echo $this->borderRadius; ?>";

            var padding = "<?php echo $this->padding; ?>";

            var submitHoverColor = "<?php echo $this->submitHoverColor; ?>";
            var submitHoverBackground = "<?php echo $this->submitHoverBackground; ?>";

            var submitHoverBorderStyle = "<?php echo $this->submitHoverBorderStyle; ?>";
            var submitHoverBorderColor = "<?php echo $this->submitHoverBorderColor; ?>";

            var submitHoverWeight = "<?php echo $this->submitHoverWeight; ?>";


            function CustomAlert() {
                document.querySelector('#dialogbox').style.background = backgroundOfDialogbox;
                document.querySelector('#dialogbox>div>#dialogboxhead').style.background = backgroundOfDialogboxhead;
                document.querySelector('#dialogbox>div>#dialogboxbody').style.background = backgroundOfDialogboxbody;
                document.querySelector('#dialogbox>div>#dialogboxfoot').style.background = backgroundOfDialogboxfoot;

                document.querySelector('#dialogbox>div>#dialogboxhead').style.color = titleColor;
                document.querySelector('#dialogbox>div>#dialogboxbody').style.color = textColor;

                
            this.render = function() {
                var winW = window.innerWidth;
                var winH = window.innerHeight;
                var dialogoverlay = document.getElementById('dialogoverlay');
                var dialogbox = document.getElementById('dialogbox');
                dialogoverlay.style.display = "block";
                dialogoverlay.style.height = winH + "px";
                dialogbox.style.left = (winW / 2) - (550 * .5) + "px";
                dialogbox.style.top = "100px";
                dialogbox.style.display = "block";
                document.getElementById('dialogboxhead').innerHTML = title;
                document.getElementById('dialogboxbody').innerHTML = txt;
                document.getElementById('dialogboxfoot').innerHTML = '<input type = "submit" onclick="Alert.ok()" value ="OK"></input>';
                

                //element input[submit]
                let element = document.querySelector('#dialogbox>div>#dialogboxfoot input');

                element.style.background = backgroundOfSubmit;
                element.style.color =  submitColor;
                element.style.fontWeight =  submitWeight;

                element.style.borderColor = borderColor;
                element.style.borderStyle = borderStyle;
                element.style.borderRadius = borderRadius;

                element.style.padding = padding;

                element.onmouseover = function(){
                    element.style.color = submitHoverColor;
                    element.style.background = submitHoverBackground;
                    element.style.fontWeight = submitHoverWeight;
                    element.style.borderColor = submitHoverBorderColor;
                    element.style.borderStyle = submitHoverBorderStyle;
                }
                element.onmouseout = function(){
                    element.style.color = submitColor;
                    element.style.background = backgroundOfSubmit;
                    element.style.borderColor = borderColor;
                    element.style.borderStyle = borderStyle;
                    element.style.fontWeight =  submitWeight;
                }
            }
            this.ok = function() {
                document.getElementById('dialogbox').style.display = "none";
                document.getElementById('dialogoverlay').style.display = "none";
            }
            }
        
            var Alert = new CustomAlert();

            Alert.render();
        
        </script>
        <?php
    }

    public function confirm(string $url, $responseIsNeeded = false, $trueResponse = 'OK', $falseResponse = 'OK')
    { 
        ?>
        <script>

            var txt = "<?php echo $this->txt; ?>";
            var title = "<?php echo $this->title; ?>";

            var backgroundOfDialogbox = "<?php echo $this->backgroundOfDialogbox; ?>";
            var backgroundOfDialogboxhead = "<?php echo $this->backgroundOfDialogboxhead; ?>";
            var backgroundOfDialogboxbody = "<?php echo $this->backgroundOfDialogboxbody; ?>";
            var backgroundOfDialogboxfoot = "<?php echo $this->backgroundOfDialogboxfoot; ?>";
            var backgroundOfSubmit = "<?php echo $this->backgroundOfSubmit; ?>";

            var textColor = "<?php echo $this->textColor; ?>";
            var titleColor = "<?php echo $this->titleColor; ?>";
            var submitColor = "<?php echo $this->submitColor; ?>";
            var submitWeight = "<?php echo $this->submitWeight; ?>";

            var borderStyle = "<?php echo $this->borderStyle; ?>";
            var borderColor = "<?php echo $this->borderColor; ?>";
            var borderRadius = "<?php echo $this->borderRadius; ?>";

            var padding = "<?php echo $this->padding; ?>";

            var submitHoverColor = "<?php echo $this->submitHoverColor; ?>";
            var submitHoverBackground = "<?php echo $this->submitHoverBackground; ?>";

            var submitHoverBorderStyle = "<?php echo $this->submitHoverBorderStyle; ?>";
            var submitHoverBorderColor = "<?php echo $this->submitHoverBorderColor; ?>";

            var submitHoverWeight = "<?php echo $this->submitHoverWeight; ?>";

            var url = "<?php echo $url; ?>";
            var dataType = "<?php echo $this->dataType; ?>";
            var type = "<?php echo $this->type; ?>";

            let responseIsNeeded = "<?php echo $responseIsNeeded; ?>";    
            let trueResponse = "<?php echo $trueResponse; ?>";    
            let falseResponse = "<?php echo $falseResponse; ?>";    



            function CustomAlert() {
                document.querySelector('#dialogbox').style.background = backgroundOfDialogbox;
                document.querySelector('#dialogbox>div>#dialogboxhead').style.background = backgroundOfDialogboxhead;
                document.querySelector('#dialogbox>div>#dialogboxbody').style.background = backgroundOfDialogboxbody;
                document.querySelector('#dialogbox>div>#dialogboxfoot').style.background = backgroundOfDialogboxfoot;

                document.querySelector('#dialogbox>div>#dialogboxhead').style.color = titleColor;
                document.querySelector('#dialogbox>div>#dialogboxbody').style.color = textColor;

                
            this.render = function() {
                var winW = window.innerWidth;
                var winH = window.innerHeight;
                var dialogoverlay = document.getElementById('dialogoverlay');
                var dialogbox = document.getElementById('dialogbox');
                dialogoverlay.style.display = "block";
                dialogoverlay.style.height = winH + "px";
                dialogbox.style.left = (winW / 2) - (550 * .5) + "px";
                dialogbox.style.top = "100px";
                dialogbox.style.display = "block";
                document.getElementById('dialogboxhead').innerHTML = title;
                document.getElementById('dialogboxbody').innerHTML = txt;
                document.getElementById('dialogboxfoot').innerHTML = '<input type = "submit" onclick="Alert.result(true)" value ="OK"> <input type = "submit" onclick="Alert.result(false)" value ="CANCEL">';                        

                let submits = document.querySelectorAll('#dialogbox>div>#dialogboxfoot input');
                for (let index = 0; index < submits.length; index++) {
                    let element = submits[index];

                    element.style.background = backgroundOfSubmit;
                    element.style.color =  submitColor;
                    element.style.fontWeight =  submitWeight;

                    element.style.borderColor = borderColor;
                    element.style.borderStyle = borderStyle;
                    element.style.borderRadius = borderRadius;

                    element.style.padding = padding;

                    element.onmouseover = function(){
                        element.style.color = submitHoverColor;
                        element.style.background = submitHoverBackground;
                        element.style.fontWeight = submitHoverWeight;
                        element.style.borderColor = submitHoverBorderColor;
                        element.style.borderStyle = submitHoverBorderStyle;
                    }
                    element.onmouseout = function(){
                        element.style.color = submitColor;
                        element.style.background = backgroundOfSubmit;
                        element.style.borderColor = borderColor;
                        element.style.borderStyle = borderStyle;
                        element.style.fontWeight =  submitWeight;
                    }
                }

            } //                        

            this.result = function(result) {
                document.getElementById('dialogbox').style.display = "none";
                document.getElementById('dialogoverlay').style.display = "none";

                $.ajax({
                    url: url, //url
                    type: type, //метод отправки
                    dataType: dataType, //формат данных
                    data: "confirm=" + encodeURIComponent(result),//result,
                }); 

                setTimeout(() => { if (responseIsNeeded) {
                        if (result) {
                            alert(trueResponse);
                        }
                        else
                        {
                            alert(falseResponse);
                        }
                    } 
                }, 50);
            }

            }
        
            var Alert = new CustomAlert();

            Alert.render();
            

        </script>
        <?php
    }



    public function prompt(string $url, $responseIsNeeded = false, string $response = 'OK')
    { 
        ?>



        <script>

            var txt = "<?php echo $this->txt; ?>";
            var title = "<?php echo $this->title; ?>";

            var backgroundOfDialogbox = "<?php echo $this->backgroundOfDialogbox; ?>";
            var backgroundOfDialogboxhead = "<?php echo $this->backgroundOfDialogboxhead; ?>";
            var backgroundOfDialogboxbody = "<?php echo $this->backgroundOfDialogboxbody; ?>";
            var backgroundOfDialogboxfoot = "<?php echo $this->backgroundOfDialogboxfoot; ?>";
            var backgroundOfSubmit = "<?php echo $this->backgroundOfSubmit; ?>";

            var textColor = "<?php echo $this->textColor; ?>";
            var titleColor = "<?php echo $this->titleColor; ?>";
            var submitColor = "<?php echo $this->submitColor; ?>";
            var submitWeight = "<?php echo $this->submitWeight; ?>";

            var borderStyle = "<?php echo $this->borderStyle; ?>";
            var borderColor = "<?php echo $this->borderColor; ?>";
            var borderRadius = "<?php echo $this->borderRadius; ?>";

            var padding = "<?php echo $this->padding; ?>";

            var submitHoverColor = "<?php echo $this->submitHoverColor; ?>";
            var submitHoverBackground = "<?php echo $this->submitHoverBackground; ?>";

            var submitHoverBorderStyle = "<?php echo $this->submitHoverBorderStyle; ?>";
            var submitHoverBorderColor = "<?php echo $this->submitHoverBorderColor; ?>";

            var submitHoverWeight = "<?php echo $this->submitHoverWeight; ?>";

            var url = "<?php echo $url; ?>";
            var dataType = "<?php echo $this->dataType; ?>";
            var type = "<?php echo $this->type; ?>";
//нужно доделать!!
            let responseIsNeeded = "<?php echo $responseIsNeeded; ?>";    
            let response = "<?php echo $response; ?>";    


            function CustomAlert() {
                document.querySelector('#dialogbox').style.background = backgroundOfDialogbox;
                document.querySelector('#dialogbox>div>#dialogboxhead').style.background = backgroundOfDialogboxhead;
                document.querySelector('#dialogbox>div>#dialogboxbody').style.background = backgroundOfDialogboxbody;
                document.querySelector('#dialogbox>div>#dialogboxfoot').style.background = backgroundOfDialogboxfoot;

                document.querySelector('#dialogbox>div>#dialogboxhead').style.color = titleColor;
                document.querySelector('#dialogbox>div>#dialogboxbody').style.color = textColor;

                
            this.render = function() {
                var winW = window.innerWidth;
                var winH = window.innerHeight;
                var dialogoverlay = document.getElementById('dialogoverlay');
                var dialogbox = document.getElementById('dialogbox');
                dialogoverlay.style.display = "block";
                dialogoverlay.style.height = winH + "px";
                dialogbox.style.left = (winW / 2) - (550 * .5) + "px";
                dialogbox.style.top = "100px";
                dialogbox.style.display = "block";
                document.getElementById('dialogboxhead').innerHTML = title;
                document.getElementById('dialogboxbody').innerHTML = '<input type = "text">';
                document.querySelector('#dialogboxbody input').placeholder = txt;
                document.getElementById('dialogboxfoot').innerHTML = '<input type = "submit" onclick="Alert.result()" value ="SEND"></input>';
                

                let submits = document.querySelectorAll('#dialogbox>div>#dialogboxfoot submit');
                for (let index = 0; index < submits.length; index++) {
                    let element = submits[index];

                    element.style.background = backgroundOfSubmit;
                    element.style.color =  submitColor;
                    element.style.fontWeight =  submitWeight;

                    element.style.borderColor = borderColor;
                    element.style.borderStyle = borderStyle;
                    element.style.borderRadius = borderRadius;

                    element.style.padding = padding;

                    element.onmouseover = function(){
                        element.style.color = submitHoverColor;
                        element.style.background = submitHoverBackground;
                        element.style.fontWeight = submitHoverWeight;
                        element.style.borderColor = submitHoverBorderColor;
                        element.style.borderStyle = submitHoverBorderStyle;
                    }
                    element.onmouseout = function(){
                        element.style.color = submitColor;
                        element.style.background = backgroundOfSubmit;
                        element.style.borderColor = borderColor;
                        element.style.borderStyle = borderStyle;
                        element.style.fontWeight =  submitWeight;
                    }
                }

            } 
            
            this.result = function() {
                document.getElementById('dialogbox').style.display = "none";
                document.getElementById('dialogoverlay').style.display = "none";

                $.ajax({
                    url: url, //url
                    type: type, //метод отправки
                    dataType: dataType, //формат данных
                    data: "confirm=" + encodeURIComponent(document.querySelector('#dialogboxbody input').value),
                }); 
                setTimeout(() => { if (responseIsNeeded) {
                alert(response);
                } }, 50);   
            }
            }
        
            var Alert = new CustomAlert();

            Alert.render();
            

        </script>
        <?php
    }

}



