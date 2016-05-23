// -------------
// Component example
// -------------

import $ from 'jquery'
import React from 'react'
import { ReactDOM } from 'react-dom'

export default React.createClass({
	// Get default state for datas in component
	getInitialState: function() {
		return {
			clickMessage: ""
		}
	},
	// Callback when is mounted and ready to process
	componentDidMount: function() {
		// Do stuff like ajax call
	},
	// Callback when component will unmount
	componentWillUnmount: function() {
		// Do stuff like remove timers
	},
	// Some function
	handleClickEvent: function() {
		this.props.onClickEvent({content: 'You clicked on Example component!'})
		// Will not work, just for example
		// Don't forget to .bind(this) with jQuery to get access to the React component
		$.ajax({
			url: 'http://www.google.com',
			done: function(data) {
				this.setState({clickMessage: 'Ajax call success message'})
			}.bind(this),
			error: function(xhr, status, err) {
				this.setState({clickMessage: 'Ajax response: ' + status.toString()})
			}.bind(this)
		})
	},
	// Render function
	render: function() {
		return (
			<div className="example" onClick={this.handleClickEvent}>
				<p>{this.props.data}</p>
				<p>{this.state.clickMessage}</p>
			</div>
		)
	}
})