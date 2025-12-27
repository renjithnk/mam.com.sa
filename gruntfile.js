module.exports = function(grunt) {
    grunt.initConfig({
        cssmin : {
            target : {
                src : ["logistics/assets/css/styles.css"],
                dest : "logistics/assets/css/styles.min.css"
            }
        },
        uglify: {
            options: {
              mangle: false
            },
            my_target: {
              files: {
                'logistics/assets/js/scripts.min.js': ['logistics/assets/js/scripts.js']
              }
            }
          }
    });   
    
    grunt.loadNpmTasks('grunt-contrib-cssmin');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.registerTask("default", ["cssmin","uglify"]);

}