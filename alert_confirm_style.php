<div id="myModal" class="modal">
    <div class="modal-content">
      <span class="close">&times;</span>
      <p>Êtes-vous sûr de vouloir le supprimer ?</p>
      <button id="confirmDelete" class="btn-confirm delete">Supprimer</button>
      <button id="cancelDelete" class="btn-confirm edit">Annuler</button>
    </div>
</div>
<style>
  .modal {
    display: none; 
    position: fixed;
    z-index: 1; 
    left: 0;
    top: 0;
    width: 100%; 
    height: 100%;
    overflow: auto; 
    background-color: rgba(0, 0, 0, 0.4); 
  }
  /* Modal Content */
  .modal-content {
    border-radius: 5px;
    background-color: #fefefe;
    margin: auto;
    padding-top: 20px;
    padding-bottom: 5px;
    padding-left: 20px;
    padding-right: 20px;
    border: 1px solid #888;
    width: 40%; 
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
  }

  /* Close Button */
  .close {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
  }

  .close:hover,
  .close:focus {
    color: black;
    text-decoration: none;
    cursor: pointer;
  }

  .btn-confirm{
    border: 1px solid #ccc;
    border-radius: 5px;
    margin: 10px 5px;
    padding: 5px;
  }
  .delete{
    background-color: rgb(185, 131, 131);
    color: white;
  }
  .edit{
        background-color:#8FBC8F;
        color: white;
  }
  </style>
  <script>
    document.getElementById("myModal").style.display = "none";
  </script>