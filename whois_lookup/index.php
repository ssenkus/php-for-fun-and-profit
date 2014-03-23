<!doctype html>
<html>
    <head>
        <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
        <style>
        .row {
            padding: 25px;
        }
        
        </style>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>WHOIS Lookup</h1>
                    <p>Uses WHOIS servers operated by the Regional Internet Registries </p>
                </div>
            </div>            
            <div class="row">
                <div class="col-md-4">
                    <form class="form-inline" >
                         <div class="form-group">
                            <label class="sr-only" for="exampleInputEmail2">Email address</label>
                            <input id="whois_domain" class="form-control" type="text" />
                        </div>
                        <div class="form-group">
                            <button id="search" class="btn btn-success">Find Whois Record</button> 
                        </div>
                        
                        
                    </form>
                 </div>
             </div>
            <div class="row">
                <div class="col-md-12" id="result">
                    
                
                </div>
            </div>
        </div>
        <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
        <script>
            $(document).ready(function() {
            
                $('#search').on('click', function(e) {
                    e.preventDefault();
                    $.ajax({
                        url: 'whois.php',
                        data: {
                            whois_domain: $('#whois_domain').val()
                        },
                        success: function(data) {
                            $('#result').empty();
                            $(data).each(function(a,b) {
                                $('#result').append('<div class="col-md-6"><h3>' + b['regIntReg'] + '</h3><pre style="word-wrap:break-word;">' + b['data'] + '</pre></div>');
                            });
                        },
                        error: function(a,b,c) {
                            console.log('error',a,b,c)
                        }
                    });
                });
            
            
            
            });
        
        </script>
    </body>
</html>