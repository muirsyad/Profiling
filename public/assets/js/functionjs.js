
        // event.preventDefault();
        var count = 1
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
                cL += 1;
                num = cL;
                qury = '.example2'+style;
                style = stylevar(style);
                nv = style+type+cL;
                console.log(nv);
            }


            const newrow = document.querySelector(qury);
            //create element
            const newdiv = document.createElement('div');
            newdiv.className = 'mb-3';
            const newinput = document.createElement('input');
            newinput.className = 'form-control';
            newinput.name=nv;

            newrow.appendChild(newdiv);
            newdiv.appendChild(newinput);



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
