module.exports = function(grunt) {
	grunt.initConfig({
		pkg: grunt.file.readJSON('package.json'),
		sass: {
			dist: {
				files: {
                    'library/css/style.css': 'library/scss/style.scss'
                }
			}
		},
		autoprefixer: {
		    options: {
		      // Task-specific options go here. 
		    },
			no_dest: {
				src: 'library/css/style.css'
			},
		},
		imagemin: {                          // Task
		    dynamic: {                         // Another target
		      files: [{
		        expand: true,                  // Enable dynamic expansion
		        cwd: 'src/',                   // Src matches are relative to this path
		        src: ['**/*.{png,jpg,gif}'],   // Actual patterns to match
		        dest: 'dist/'                  // Destination path prefix
		      }]
		    }
		},
		watch: {
			css: {
				files: '**/*.scss',
				tasks: ['sass', 'autoprefixer']
			}
		}
	});
	grunt.loadNpmTasks('grunt-contrib-sass');
	grunt.loadNpmTasks('grunt-contrib-watch');
	grunt.loadNpmTasks('grunt-autoprefixer');
	grunt.loadNpmTasks('grunt-contrib-imagemin');
	grunt.registerTask('default',['sass','watch','autoprefixer','imagemin']);
}