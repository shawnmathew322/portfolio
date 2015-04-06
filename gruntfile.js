module.exports = function(grunt) {
	
	require("matchdep").filterDev("grunt-*").forEach(grunt.loadNpmTasks);
	
	grunt.initConfig({
		pkg: grunt.file.readJSON('package.json'),
		sass: {
			dist: {
				options: {
					style: 'expanded'
				},
				files: {
					'build/css/master.css': 'sass/master.scss'
				}
			},
			dev: {
				options: {
					style: 'compressed'
				},
				files: {
					'build/css/master.min.css': 'sass/master.scss'	
				}
			},
			dev2: {
				options: {
					style: 'compressed'
				},
				files: {
					'style.css': 'sass/master.scss'	
				}
			}
		},
		watch: {
			css: {
				files: ['sass/**/*.scss'],
				tasks: ['buildcss']
			}
		}
	});

	grunt.registerTask('default', []);
	grunt.registerTask('buildcss', ['sass']);
};