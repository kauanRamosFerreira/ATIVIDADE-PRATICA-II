document.addEventListener("DOMContentLoaded", () => {
  // Para cada post
  document.querySelectorAll(".novo_post").forEach((post) => {

    // ------------------ Curtir ------------------
    const btnLike = post.querySelector(".btn_like");

    if (btnLike) {
      btnLike.addEventListener("click", () => {
        const contador = btnLike.querySelector(".like_count");
        let num = parseInt(contador.textContent);
        contador.textContent = num + 1;
      });
    }

    // ------------------ Mostrar/ocultar comentários ------------------
    const btnCommentToggle = post.querySelector(".btn_comentario");
    const commentSection = post.querySelector(".comentarios_posts");
    const commentCount = post.querySelector(".comment_count");

    if (btnCommentToggle && commentSection) {
      btnCommentToggle.addEventListener("click", () => {
        commentSection.style.display =
          commentSection.style.display === "none" ? "block" : "none";
      });
    }

    // ------------------ Adicionar comentário ------------------
    const btnAddComment = post.querySelector(".btn_add_comentario");
    const commentInput = post.querySelector(".comment_input");
    const commentList = post.querySelector(".comment_list");
    let comments = 0;

    if (btnAddComment && commentInput && commentList) {
      btnAddComment.addEventListener("click", () => {
        const commentText = commentInput.value.trim();
        if (!commentText) return;

        const li = document.createElement("li");
        li.textContent = commentText;
        commentList.appendChild(li);

        comments++;
        if (commentCount) commentCount.textContent = comments;

        commentInput.value = "";
      });
    }

  });
});