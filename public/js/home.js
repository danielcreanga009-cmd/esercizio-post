document.addEventListener("DOMContentLoaded", function() {

    document.querySelectorAll(".form-like").forEach(form => {

        form.addEventListener("submit", async function(e) {
            e.preventDefault();

            try {
                const response = await fetch(this.action, {
                    method: "POST",
                    headers: {
                        "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content,
                        "Accept": "application/json"
                    }
                });

                const data = await response.json();
                console.log(data);

                const likeBtn = this.querySelector(".likeBtn");
                const numOfLike = this.querySelector(".numOfLike");

                if(data.liked){ 
                    likeBtn.textContent = "♥"; 
                }
                else{ 
                    likeBtn.textContent = "♡"; 
                }

                numOfLike.textContent = data.likes_count;


            } catch (error) {
                console.log(error);
            }
        });

    });

});