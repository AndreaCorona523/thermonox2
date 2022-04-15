const form = document.getElementById("contact_form")

function enviar(){
	emailjs.init("PUBLIC_KEY")

	emailjs.send("SERVICE_ID", "TEMPLATE_ID", {
		subject: form.subject.value,
		name: form.name.value,
		email: form.email.value,
		user_type: form.user_type.value,
		message: form.message.value,
		country: form.country.value,
		city: form.city.value,
		state: form.state.value,
		zip_code: form.zip_code.value,
		accepted_privacy_policy: form.accepted_privacy_policy.checked,
		send_copy: form.send_copy.checked,
		reply_to: form.send_copy.checked ? form.email.value : ''
	})
	.then(result => {
		console.log(result.text)
	}, error => {
		console.log(error.text)
	})
}