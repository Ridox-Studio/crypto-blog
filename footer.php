</main>
<script>
        function manageLoadTrigger(){
            if (window.innerWidth <= 514) {
                let nav = document.querySelector("nav");
                nav.style.visibility = "hidden";
            }
            else{
                let nav = document.querySelector("nav");
                nav.style.visibility = "visible";

            }
        }

        document.querySelector("main").addEventListener("click", function(){
            if (window.innerWidth <= 514) {
                let nav = document.querySelector("nav");
                nav.style.visibility = "hidden";
            }
            else{
                let nav = document.querySelector("nav");
                nav.style.visibility = "visible";

            }
            
            
            
        })
        document.querySelector("nav").addEventListener("click", function(){
            if (window.innerWidth <= 514) {
                let nav = document.querySelector("nav");
                nav.style.visibility = "visible";
            }
            
        })
</script>
    
    
</body>

</html>