import React from 'react'
import { render } from 'react-dom'
import { Router, Route, Link, browserHistory } from 'react-router'

// -------------
// React main app with router example
// -------------
import Example from './components/example.jsx'

var ExampleComponent = React.createClass({
	// Some function
	handleClickEvent: function(data) {
		alert(data.content)
	},
	// Render function
  render: function() {
    return (
      <Example data='hello, click me!' onClickEvent={this.handleClickEvent} />
    )
  }
})

var App = React.createClass({
	// Render function
  render: function() {
    return (
      <div>
      	<Link to="/">Home</Link>
      	<Link to={'/example'}>Launch example component</Link>
        {this.props.children}
      </div>
    )
  }
})

render((
  <Router history={browserHistory}>
    <Route path="/" component={App}>
      <Route path="example" component={ExampleComponent} />
    </Route>
  </Router>
), document.getElementById('app'))