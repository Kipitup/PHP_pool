var tab = [];

function new_to_do(task) {
	if (task == null || task == "") {
		task = prompt("Entrez une nouvelle tâche:");
		if (task === "" || task === null)
			return ;
	}
	var list = document.getElementById('ft_list');
	var new_task = document.createElement('div');
	var text = document.createTextNode(task);
	new_task.appendChild(text);
	new_task.setAttribute('style', 'border: 1px grey solid;background-color: #DFFFFA;padding:5px 20px 5px 20px;margin: 5px;')
	new_task.onclick = function() {
		ret = confirm("Voulez-vous supprimer cette tâche ?");
		if (ret === true) {
			list.removeChild(new_task);
		}
	};
	list.appendChild(new_task);
	tab.push(task);
	setCookie();
}

window.onload = function() {
  if (document.cookie)
  {
    var cook = document.cookie;
    var newtab = cook.split("=");
    var test = JSON.parse(newtab[1]);
    for (elem in test)
    {
      new_to_do(test[elem]);
    }
  }
}

function setCookie()
{
	var json_str = JSON.stringify(tab);
	document.cookie = "todos" + "=" + json_str + ";";
}
