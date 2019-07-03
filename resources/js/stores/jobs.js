export default {
	state:{
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
	    }
	},
	actions:{}
}