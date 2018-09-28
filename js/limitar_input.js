function limitarInput(obj, quanto) {
	obj.value = obj.value.substring(0,quanto); //Aqui eu pego o valor e só deixo o os 10 primeiros caracteres de valor no input
}
