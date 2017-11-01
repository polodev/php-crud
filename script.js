var table = document.querySelector('table');
if (table) {
  table.addEventListener('click', function (e) {
    if (e.target.classList.contains('deleteClass')) {
      if ( confirm('Are you sure, you want to delete this entry') ) {
        return true;
      }else {
        e.preventDefault();
      }
    } else {
      return false;
    }
  });
}
