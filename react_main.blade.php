@extends('layouts.master_public')

@section('title', 'React.js demo')
@section('page_specific_jquery')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/react/0.14.7/react.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/react/0.14.7/react-dom.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/babel-core/5.8.23/browser.min.js"></script>
 
 
     <script type="text/babel">

var CommentBox = React.createClass({

  loadCommentsFromServer: function() {
    $.ajax({
      url: this.props.url,
      dataType: 'json',
      cache: false,
      success: function(data) {
        this.setState({data: data});
      }.bind(this),
      error: function(xhr, status, err) {
        console.error(this.props.url, status, err.toString());
      }.bind(this)
    });
  },

  getInitialState: function() {
    return {data: []};
  },

  componentDidMount: function() {
    this.loadCommentsFromServer();
    setInterval(this.loadCommentsFromServer, this.props.pollInterval);
  },

  render: function() {
    return (
      <div className="commentBox">
        <p>Results - two random strings that update every two seconds</p>
        <CommentList data={this.state.data} />
      </div>
    );
  }

});

var CommentList = React.createClass({
  render: function() {

    var commentNodes = this.props.data.map(function(comment) {
      return (
        <Comment author={comment.str_name} key={comment.id}>
          {comment.str_content}
        </Comment>
      );
    });
    return (
      <div className="commentList">
        {commentNodes}
      </div>
    );

  }
});


var Comment = React.createClass({
  render: function() {
 
   return (
      <div className="comment">
        <h2 className="commentAuthor">
          {this.props.author}
        </h2>
        {this.props.children}
      </div>
    );
  }
});


ReactDOM.render(
  <CommentBox url="/react/react_data" pollInterval={2000} />,
  document.getElementById('content')
);


</script>
 
@endsection

@section('content')

<div class="row">
<div class="col-sm-2"><br><br> </div>
<div class="col-sm-8"> React.js project prepared for Jeff Weiser, by Doug
<div class="col-sm-2"> </div>
</div><!-- end row -->
    
 
<div class="row">
<div class="col-sm-2"><br><br> </div>
<div class="col-sm-8">  <div id="content"></div>
<div class="col-sm-2"> </div>
</div><!-- end row -->
 
@endsection	