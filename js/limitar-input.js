function limitarInput(obj, quanto) {
	obj.value = obj.value.substring(0,quanto);
	return obj;
}
