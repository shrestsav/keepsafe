export default {
	state:{
		currentPage:'',
		currentMenu:'',
		eventStatuses: {},
		eventTypes: {},
		eventVehicles: {},
	},
	getters:{
	},
	mutations:{
		changeEventStatuses(state, eventStatuses) {
	      state.eventStatuses = eventStatuses
	    },
	    changeEventTypes(state, eventTypes) {
	      state.eventTypes = eventTypes
	    },
	    changeEventVehicles(state, eventVehicles) {
	      state.eventVehicles = eventVehicles
	    },
	    changeCurrentPage(state, currentPage) {
	      state.currentPage = currentPage
	    },
	    changeCurrentMenu(state, currentMenu) {
	      state.currentMenu = currentMenu
	    },
	},
	actions:{}
}