
        // event.preventDefault();

        $(document).ready(function() {
            $("#hide").click(function() {
                $("p").hide();
            });
            $("#show").click(function() {
                $("p").show();
            });
            $("#tshow").click(function(){
                $("#div1").fadeOut("slow");
            });
            $("#sh").click(function(){
                if($("#div1").is(":hidden")){
                    $("#div1").fadeIn();
                    $("#div3").fadeOut();
                    $("#div3").hide();
                }
                //  else {
                //     $("#div1").fadeOut();
                //     $("#div1").hide();
                // }
            });
            $("#sh2").click(function(){
                if($("#div3").is(":hidden")){
                    $("#div3").fadeIn();
                    $("#div1").fadeOut();
                    $("#div1").hide();
                }
            });

            $("#btn-D").click(function(){
                if($("#tab-D").is(":hidden")){
                    $("#tab-D").fadeIn();
                    $("#tab-i").fadeOut();
                    $("#tab-i").hide();
                    $("#tab-S").fadeOut();
                    $("#tab-S").hide();
                    $("#tab-C").fadeOut();
                    $("#tab-C").hide();
                }
            });
            $("#btn-i").click(function(){
                console.log("I");
                if($("#tab-i").is(":hidden")){
                    $("#tab-i").fadeIn();
                    $("#tab-D").fadeOut();
                    $("#tab-D").hide();
                    $("#tab-S").fadeOut();
                    $("#tab-S").hide();
                    $("#tab-C").fadeOut();
                    $("#tab-C").hide();
                }
            });

            $("#btn-S").click(function(){
                if($("#tab-S").is(":hidden")){
                    $("#tab-S").fadeIn();
                    $("#tab-D").fadeOut();
                    $("#tab-D").hide();
                    $("#tab-i").fadeOut();
                    $("#tab-i").hide();
                    $("#tab-C").fadeOut();
                    $("#tab-C").hide();
                }
            });
            $("#btn-C").click(function(){
                if($("#tab-C").is(":hidden")){
                    $("#tab-C").fadeIn();
                    $("#tab-D").fadeOut();
                    $("#tab-D").hide();
                    $("#tab-S").fadeOut();
                    $("#tab-S").hide();
                    $("#tab-i").fadeOut();
                    $("#tab-i").hide();
                }
            });

            // Test new query
            $(document).ready(function() {
                $("#hidep").click(function() {
                    $("p").hide();
                });
                $("#showp").click(function() {
                    $("p").show();
                });
            });


        });

        var count = 1
        console.log(count);
        function addrow() {

            count += 1;
            console.log(count);

            const newrow = document.querySelector('.example');
            //create element
            const newdiv = document.createElement('div');
            newdiv.className = 'mb-3';
            const newlabel = document.createElement('label');
            newlabel.className = 'form-label'
            newlabel.innerText = 'Email Address';
            const newinput = document.createElement('input');
            newinput.className = 'form-control';
            newinput.name="email"+count;

            newrow.appendChild(newdiv);
            newdiv.appendChild(newlabel);
            newdiv.appendChild(newinput);

        }
        var cH=1;
        var cL=1;
        var num=0;
        var nv=null;
        var cH = document.getElementById('ch').textContent;
        var cL = document.getElementById('cl').textContent;
        // console.log(cH);
        cH = parseInt(cH);
        cL = parseInt(cL);
        // console.log(cH);
        function addro(type,style){

            if(type == 'High'){
                console.log(type+"in");
                cH += 1;
                num = cH;

                qury = '.example'+style;
                style = stylevar(style);
                nv = style+type+cH;
                console.log(nv+qury);

            }
            else{
                if(cL === 4){
                    document.getElementById("btn-dL").disabled = true;
                    cL += 1;
                    num = cL;
                    qury = '.example2'+style;
                    style = stylevar(style);
                    nv = style+type+cL;
                    console.log(nv);
                }else{
                    cL += 1;
                    num = cL;
                    qury = '.example2'+style;
                    style = stylevar(style);
                    nv = style+type+cL;
                    console.log(nv);
                    }

            }


            const newrow = document.querySelector(qury);
            //create element
            const newdiv = document.createElement('div');
            newdiv.className = 'mb-3';
            newdiv.id = nv;
            const newinput = document.createElement('input');
            newinput.className = 'form-control';
            newinput.name=nv;

            newrow.appendChild(newdiv);
            newdiv.appendChild(newinput);
            console.log(cL);



        }

        function removero(type,style,count){
            const con = document.getElementById(ch+style);
            console.log(con);
            console.log(style+"_"+type+count);
            const element = document.getElementById(style+"_"+type+count);
            console.log(element);
            element.remove();
        }
        function stylevar(style){
            switch(style){
                case 'D':
                    style = 'D';
                    break;
                case 'i':
                    style = 'i';
                    break;
                case 'S':
                    style = 'S';
                    break;
                case 'C':
                    break;
                default:
                    console.log('ERROR')
            }
            return style;


        }

    //functionn jquery
