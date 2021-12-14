<?php
namespace Core;
require_once 'Interfaces/IAlertable.php'; 
require_once 'Interfaces/IConfirmable.php'; 
require_once 'Interfaces/IPromptable.php'; 

use Core\Interfaces\IAlertable;
use Core\Interfaces\IConfirmable;
use Core\Interfaces\IPromptable;




class DefaultAlert implements IAlertable, IConfirmable, IPromptable
{


    function __construct(string $txt, string $dataType = 'html', string $type = 'POST')
    {
        $this->txt = $txt;
        $this->dataType = $dataType;
        $this->type = $type;

    }

    public function alert()
    { 
        ?>
        <script>
             let txt = "<?php echo $this->txt; ?>";
             alert(txt);
        </script>
        <?php
    }

    public function confirm(string $url, $trueResponseIsNeeded = false, $falseResponseIsNeeded = false, $trueResponse = 'OK', $falseResponse = 'OK')
    { 
    ?>
        <script>
        let txt = "<?php echo $this->txt; ?>";
        let dataType = "<?php echo $this->dataType; ?>";    
        let type = "<?php echo $this->type; ?>";   
        
        let url = "<?php echo $url; ?>";    
        let trueResponseIsNeeded = "<?php echo $trueResponseIsNeeded; ?>";    
        let falseResponseIsNeeded = "<?php echo $falseResponseIsNeeded; ?>";    

        let trueResponse = "<?php echo $trueResponse; ?>";    
        let falseResponse = "<?php echo $falseResponse; ?>";    


        var confirm = confirm(txt);
        $.ajax({
            url: url,
            dataType: dataType,
            type: type,
            data: "confirm=" + encodeURIComponent(confirm), 
        })        
        if(confirm) 
        {
           if(trueResponseIsNeeded) alert(trueResponse); 
        }
        else
        {
            if(falseResponseIsNeeded) alert(falseResponse); 
        }  
        

        </script>
    <?php
    }

    public function prompt(string $url,  $trueResponseIsNeeded = false, $falseResponseIsNeeded = false, $trueResponse = 'OK', $falseResponse = 'OK')
    { 
    ?>
        <script>
        let txt = "<?php echo $this->txt; ?>";
        let dataType = "<?php echo $this->dataType; ?>";    
        let type = "<?php echo $this->type; ?>";    


        let url = "<?php echo $url; ?>";    
        let trueResponseIsNeeded = "<?php echo $trueResponseIsNeeded; ?>";    
        let falseResponseIsNeeded = "<?php echo $falseResponseIsNeeded; ?>";    


        let trueResponse = "<?php echo $trueResponse; ?>";    
        let falseResponse = "<?php echo $falseResponse; ?>";    


        var prompt = prompt(txt);
        $.ajax({
            url: url,
            dataType: dataType,
            type: type,
            data: "prompt=" + encodeURIComponent(prompt), 
        })   
        
        if(prompt) 
        {
           if(trueResponseIsNeeded) alert(trueResponse); 
        }
        else
        {
            if(falseResponseIsNeeded) alert(falseResponse); 
        }  

        
        </script>
    <?php
    }


    public function __set($property, $value)
    {
        $this->$property = $value; // устанавливаем значение
    }

}


