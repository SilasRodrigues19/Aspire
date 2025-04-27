/**
 * @type {HTMLElement} notificationBox - The notification box element.
 */
let notificationBox = document.querySelector("#reportPost");

/**
 * @type {HTMLElement} rollBackReportNotification - The element of reverting the state of the report vacancy notification
 */
let rollBackReportNotification = document.querySelector(
	"#rollBackReportNotification"
);

document.addEventListener("DOMContentLoaded", () => {
	document.body.contains(rollBackReportNotification) &&
		rollBackReportNotification.classList.add("d-none");
});

/**
 * @type {NodeList} levelItems - The list of  menu level items.
 */
const levelItems = document.querySelectorAll(".level-item");

/**
 * @type {boolean} isMobile - Indicates whether the device is mobile.
 */
const isMobile = navigator.userAgent.match(
	/Tablet|iPad|iPod|iPhone|Android|webOS|BlackBerry|Windows Phone/i
);

/**
 * Adds the appropriate margin class to each level item based on the device type.
 * @param {HTMLElement} levelItem - The level item element
 * @returns {void}
 */
levelItems.forEach((levelItem) => {
	levelItem.classList.add(isMobile ? "mx-1" : "mx-4");
});

window.history.replaceState &&
	window.history.replaceState(null, null, window.location.href);

/**
 * @function showAlertBox
 * Displays a Swal (SweetAlert) notification box.
 *
 * @param {string} title - The title of the notification box.
 * @param {string} text - The text content of the notification box.
 * @param {("warning"|"info"|"error"|"success")} icon - The icon type for the notification box.
 */
const showAlertBox = (title, text, icon) => {
	Swal.fire({
		title: title,
		html: text,
		icon: icon,
		showClass: {
			popup: "animate__animated animate__zoomIn",
		},
		hideClass: {
			popup: "animate__animated animate__zoomOut",
		},
		allowOutsideClick: false,
		allowEscapeKey: false,
		allowEnterKey: false,
		confirmButtonText: "Fechar",
	});
};

/**
 * @function removeFilter
 * Removes the filter and reloads the page.
 */
const removeFilter = () => {
	let search = document.querySelector("#search"),
		formFilter = document.querySelector("#form-filter");
	search.value = "";
	setTimeout(() => {
		formFilter.submit();
		location.reload();
	}, 1000);
};

/**
 * @function closeWarning
 * Closes the notification box and displays the rollBackReportNotification element.
 */
const closeWarning = () => {
	notificationBox.classList.add("d-none");
	rollBackReportNotification.classList.remove("d-none");
};

/**
 * @function revertWarning
 * Reverts the warning by displaying the notification box and hiding the rollBackReportNotification element.
 */
const revertWarning = () => {
	notificationBox.classList.remove("d-none");
	rollBackReportNotification.classList.add("d-none");
};

/**
 * @constant {HTMLElement|null} showMessage - The element representing the message to be shown.
 */
const showMessage = document.querySelector(".showMessage");

/**
 * @constant The delay duration (in milliseconds) before hiding the showMessage element.
 * @type {number}
 */
const hideDelay = 5000;

if (document.body.contains(showMessage)) {
	setTimeout(() => {
		showMessage.classList.add("d-none");
	}, hideDelay);
}

/**
 * @constant {HTMLElement|null} job_title - The element representing the job title input field.
 */
const job_title = document.querySelector("#job_title");

/**
 * @constant {HTMLElement|null} job_link - The element representing the job link input field.
 */
const job_link = document.querySelector("#job_link");

/**
 * @constant {HTMLElement|null} job_level - The element representing the job level input field.
 */
const job_level = document.querySelector("#job_level");

/**
 * @constant {HTMLElement|null} job_currency - The element representing the job currency input field.
 */
const job_currency = document.querySelector("#job_currency");

/**
 * @constant {HTMLElement|null} job_salary - The element representing the job salary input field.
 */
const job_salary = document.querySelector("#job_salary");

/**
 * @constant {HTMLElement|null} job_mode - The element representing the job mode input field.
 */
const job_mode = document.querySelector("#job_mode");

/**
 * @constant {HTMLElement|null} job_contract - The element representing the job contract input field.
 */
const job_contract = document.querySelector("#job_contract");

/**
 * @function formatCurrency
 * Formats the value of the job_salary input field to display the currency format.
 */
const formatCurrency = () => {
	let salary = Number(job_salary.value);
	salary = Number(salary).toLocaleString("pt-br", {
		minimumFractionDigits: 2,
	});

	job_salary.value = salary;
};

/**
 * @function handleDelete
 * Handles the deletion of a job by showing a confirmation dialog and submitting the form.
 * @param {string} job_id - The ID of the job.
 * @param {string} job_title - The title of the job.
 */
const handleDelete = (job_id, job_title) => {
	const deleteId = document.querySelector("#deleteId"),
		formFilter = document.querySelector("#form-filter");

	Swal.fire({
		title: `Tem certeza que deseja deletar a vaga ${job_title} ?`,
		confirmButtonText: "Confirmar",
		showCancelButton: true,
		cancelButtonText: "Cancelar",
		allowOutsideClick: false,
		allowEscapeKey: true,
	}).then(({ value }) => {
		if (value) {
			deleteId.value = job_id;
			setTimeout(() => {
				formFilter.submit();
			}, 1000);
		}
	});
};

/**
 * @function handleArchiving
 * Handles archiving of a job by showing a password input dialog and submitting the form.
 * @param {string} job_id - The ID of the job.
 * @param {string} job_title - The title of the job.
 */
const handleArchiving = (job_id, job_title) => {
	let archivejob_id = document.querySelector("#archivejob_id"),
		formFilter = document.querySelector("#form-filter");

	archivejob_id.value = job_id;

	setTimeout(() => {
		formFilter.submit();
		archivejob_id.value = "";
	}, 3000);
};

/**
 * @function handleReport
 * Handles reporting of a job by opening a new window and pre-filling the report form.
 * @param {string} job_id - The ID of the job.
 * @param {string} job_title - The title of the job.
 */
const handleReport = (job_id, job_title) => {
	const isDevelopment = window.location.href.includes("localhost");

	const baseUrl = isDevelopment
		? `${window.location.origin}/aspire`
		: window.location.origin;

	let url = `${baseUrl}/job/report`;
	let newWindow = window.open(url, "_blank");

	newWindow.addEventListener("DOMContentLoaded", () => {
		let reportJobIdInput = newWindow.document.querySelector("#report_job_id");
		let title = newWindow.document.querySelector("#jobTitle");
		reportJobIdInput.value = job_id;
		title.innerHTML = `Reportando a vaga <strong>${job_title}</strong>`;

		let resetBtn = newWindow.document.querySelector("#resetBtn");

		resetBtn.addEventListener("click", () => {
			title.innerHTML = "Formulário de denúncias.";
		});
	});
};

/**
 * @type {HTMLElement}
 */
let observation = document.querySelector("#observation");

/**
 * @type {HTMLElement}
 */
let btnObservation = document.querySelector("#btnObservation");

/**
 * @function toggleObservation
 * Toggles the visibility of the observation input field and updates the button text accordingly.
 * @returns {void}
 */
const toggleObservation = () => {
	observation.classList.toggle("d-none");
	if (!observation.classList.contains("d-none")) {
		btnObservation.innerText = "Remover observação";
	} else {
		btnObservation.innerText = "Adicionar observação";
	}
};

/**
 * @constant {HTMLElement|null} burger - The element representing the menu toggle.
 */
const burger = document.querySelector(".nav-toggle");

/**
 * @constant {HTMLElement|null} burger - The element representing the menu navigation.
 */
const menu = document.querySelector(".nav-menu");

if (isMobile && document.title.includes("Vagas publicadas (")) {
	menu.classList.add("is-hidden");
	burger.addEventListener("click", () => {
		burger.classList.toggle("is-active");
		menu.classList.toggle("is-hidden");
	});
}

// Login

/**
 * @constant @type {NodeListOf<HTMLElement>}
 */
const eyeIcons = document.querySelectorAll(".show-hide");

/**
 * Adds click event listeners to the eye icons to toggle the visibility of password input fields.
 * @param {HTMLElement} eyeIcon - The eye icon element
 * @param {number} i - The index of the current eye icon
 * @returns {void}
 */
eyeIcons.forEach((eyeIcon, i) => {
	eyeIcon.addEventListener("click", () => {
		/**
		 * @constant @type {NodeListOf<HTMLInputElement>}
		 */
		const pInputs = document.querySelectorAll(".passwordInput");

		const pInput = pInputs[i];

		if (pInput.type === "password") {
			eyeIcon.classList.replace("bx-hide", "bx-show");
			pInput.type = "text";
		} else {
			eyeIcon.classList.replace("bx-show", "bx-hide");
			pInput.type = "password";
		}
	});
});

// GSAP Animations

/**
 * @constant @type {NodeListOf<HTMLElement>}
 */
const inputs = document.querySelectorAll(".input-field");

/**
 * @type {NodeListOf<HTMLElement>}
 */
const icons = document.querySelectorAll(".bx");

/**
 * @type {HTMLElement}
 */
const homeIcon = document.querySelector(".backToHome");

if(document.body.contains(homeIcon) || document.body.contains(showMessage)) {
	gsap.from(".boxLogin, .showMessage", {
		opacity: 0,
		y: 50,
		duration: 0.5,
		ease: "power2.out",
	});
}

if (inputs.length > 0 || icons.length > 0) {

	gsap.set([...inputs, ...icons], { opacity: 0, y: 30 });

	/**
	 * Animates the opacity and position of the input fields using GSAP.
	 * @param {HTMLElement} input - The input field element
	 * @param {number} i - The index of the input field in the loop
	 * @returns {void}
	 */
	inputs.forEach((input, i) => {
		gsap.fromTo(
			input,
			{ opacity: 0, y: 30 },
			{ opacity: 1, y: 0, delay: i * 0.25, duration: 0.8, ease: "power2.out" }
		);
	});

	/**
	 * Animates the opacity and position of the icons using GSAP.
	 * @param {HTMLElement} icon - The icon element
	 * @param {number} i - The index of the icon in the loop
	 * @returns {void}
	 */
	icons.forEach((icon, i) => {
		gsap.fromTo(
			icon,
			{ opacity: 0, y: 30 },
			{ opacity: 1, y: 0, delay: i * 0.25, duration: 0.8, ease: "power2.out" }
		);
	});
}

if(document.body.contains(homeIcon)) {

	gsap.fromTo(
		homeIcon,
		{ opacity: 0, top: "5%", left: "20px" },
		{
			opacity: 1,
			top: "20px",
			left: "20px",
			delay: icons.length * 0.25,
			duration: 0.8,
			ease: "power2.out",
		}
	);

}

/**
 * @type {HTMLElement}
 */
const smoothScroll = document.querySelector("#smoothScroll");

document.addEventListener("scroll", () => {
	let scroll_position = window.scrollY;

	if (scroll_position < 600) {
		smoothScroll.style.cssText = "bottom: -30rem";
		return;
	}
	smoothScroll.style.cssText = "bottom: 5rem";
});

/**
 * @function initSelect2
 * Initializes the Select2 plugin on the multipleFilter element.
 *
 * @return {*|jQuery}
 */
initSelect2 = () => {
	return $(".multipleFilter").select2({
		placeholder: "Clique aqui para selecionar filtros pré-definidos",
		allowClear: true,
		language: {
			noResults: () => "Nenhum resultado encontrado",
		},
	});
};

$(document).ready(function () {
	initSelect2();

    /**
     * @event change
     * Dispatches when the value of the multipleFilter element changes.
     */
	$("#multipleFilter").on("change", function () {
		let selectedValues = $(this).val() || [];

		let valueMapping = {
			estagio: "job_level",
			trainee: "job_level",
			junior: "job_level",
			pleno: "job_level",
			senior: "job_level",
			remoto: "job_mode",
			presencial: "job_mode",
			hibrido: "job_mode",
			clt: "job_contract",
			pj: "job_contract",
			real: "job_currency",
			dollar: "job_currency",
			euro: "job_currency",
		};

		let attributes = {};

		/* Mapping the selected values to their corresponding attributes */
		selectedValues.forEach(function (value) {
			let key = valueMapping[value];
			if (key) {
				if (!attributes[key]) {
					attributes[key] = [];
				}
				attributes[key].push(value);
			}
		});

        /* If no values are selected, reset the search input and submit the form */
        if (selectedValues.length === 0) {
            let search = document.querySelector("#search"),
                formFilter = document.querySelector("#form-filter");

            search.value = "";
            setTimeout(() => {
                formFilter.submit();
                location.reload();
            }, 1000);
            return;
        }

		$.ajax({
			type: "POST",
			url: "filter-selection",
			data: attributes,
			beforeSend: function () {
				$("#loaderOverlay").addClass("is-active");
			},
			success: (data) => {
				data = data.replace(
					/<script\b[^<]*(?:(?!<\/script>)<[^<]*)*<\/script>/gi,
					""
				);

				$("#jobList").html($(data).find("#jobList").html());

				$("#multipleFilter").select2('destroy');
				initSelect2();

				/* If having a selected value, set it to the select2 */
				if (selectedValues.length > 0) {
					$("#multipleFilter").val(selectedValues).trigger("change.select2");
				}
			},
			complete: function () {
				$("#loaderOverlay").removeClass("is-active");
			},
		});
	});
});