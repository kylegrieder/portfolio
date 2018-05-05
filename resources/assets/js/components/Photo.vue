<template>
	<div>
		<slot name="title"> 
			<div class="blog-post-title">
				<h1>
					{{ this.post.title }}
				</h1>
			</div>
		</slot>
		<slot name="timestamp"> 
			<div class="timestamp" @mouseover="mouseover" @mouseleave="mouseover">
				{{ this.timeFormat }}
			</div>
		</slot>
		<slot name="body"> 
			<div class="blog-post-body">
				{{ this.post.body }}
			</div>
		</slot>
	</div>	
</template>

<script>
import store from '../store.js'
export default {

}
</script>