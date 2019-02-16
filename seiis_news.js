       // var news_num=0;
       // var descr_num=0;
       // var b = document.createTextNode('Hello');
       // document.getElementsByTagName('newscolumn')[0].appendChild(b);
    
       window.onload = function(){
	document.getElementById("newsadd").style.display='none';
    };

    $(document).ready(function(){
    $("button").click(function()
    {
        $("form").slideToggle();
    });
});

$(document).ready(function() {
    $('#note').load('notes.php');
});
	
        function showDescription(id)
	{
		if(id=="1")
		{document.getElementById('descr').innerHTML = 'Here it will load the file from the database';}
		else if (id=="2")
		{document.getElementById('descr').innerHTML = 'With Add News a new href will be created and will be given the next id(number). This id number will be stored as a global variable and will be updated with every add(++) or delete(--). In the function there will be a for loop from 1 to (global id variable) that will be entered when (i(metritis) = id). Then the command will load the appropriate file from the database based on the id that is given. Then the loops breaks.';}
	}
	
        function addNew()
	{
		document.getElementById('descr').innerHTML = '';
		var a = document.createElement('a');
                a.setAttribute('href',"");
                a.innerHTML = '' + Date() + "<br/>";
		document.getElementsByTagName('latestnews')[0].appendChild(a);
                b.innerHTML = 'Hello again!';
	}
        
        // IN THE showDescription() header
        /*document.getElementById("newsadd").style.display='none';
            var num = <?php echo $entries ?>;
            var i=0;
            for (i; i<=num; i++)
            {
                if(i==id)
                {
                    
                }*/
	


