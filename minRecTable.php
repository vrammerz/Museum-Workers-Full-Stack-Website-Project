    <!DOCTYPE html>
    <!--
    To change this license header, choose License Headers in Project Properties.
    To change this template file, choose Tools | Templates
    and open the template in the editor.
    -->
    <html>
        
            <meta charset="UTF-8">
            <title>


    .header {
      height: 50px;
      width: 50%;
      padding: 10px;
    }             


     </title>           
            <style>
    
     body {
      background-image: url('watercolour.jpg');;
    }   
                
                
                
                .column {
      float: left;
      width: 50%;
      padding: 15px;
    }      

    .row:after {
      content: "";
      display: table;
      clear: both;
    }

    @media screen and (max-width:600px) {
      .column {
        width: 100%;
      }

            </style>
    
    <div class="column">                          //outputs first and last name
   print_r("First Name      Last Name");
   print_r($_SESSION('MinRecTableName')[i]); 
   </div> 
    
   <div class="column">                           //outputs number of tours they have done below the minimum
   print_r("Tours");
   print_r($_SESSION('MinRecTableNum')[i]); 
   </div>  
       
    </head>
    
</html>
