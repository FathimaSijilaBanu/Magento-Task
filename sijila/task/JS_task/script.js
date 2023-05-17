var img1=document.getElementsByClassName("thumbnailimage")[0];
            var img2=document.getElementById("img2");
            var imb=document.getElementsByClassName("imagemodalbox")[0];
            var imb2=document.getElementsByClassName("imagemodalbox2")[0];
            var text1=document.getElementById("text1");
            var text2=document.getElementById("text2");
            var c1=document.getElementById("close1");
            var c2=document.getElementById("close2")
            img1.addEventListener("dblclick",function()
            {
                imb.style.display="block"
            })
            img2.addEventListener("dblclick",function()
            {
                imb2.style.display="block"
            });
            img1.addEventListener('click',function()
            {
                var temp=img1.src;
                 img1.src=img2.src;
                 img2.src=temp});
                 img2.addEventListener('click',function()
            {
                var temp=img1.src;
                 img1.src=img2.src;
                 img2.src=temp});
                text1.addEventListener('click',function()
                {
                    var text=text1.textContent;
                    text1.textContent=text2.textContent;
                    text2.textContent=text; 
                });
                text2.addEventListener('click',function()
                {
                    var text=text2.textContent;
                    text2.textContent=text1.textContent;
                    text1.textContent=text; 
                });
                c1.addEventListener('click',function()
                {
                    imb.style.display="none"
                })
                c2.addEventListener('click',function()
                {
                    imb2.style.display="none"
                })