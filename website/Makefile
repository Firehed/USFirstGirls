USER=$@

all:
	@echo "Select a user. Valid users are: "
	@ls targets

%:
	cp targets/$(USER)/config/*.php private/application/config
	cp targets/$(USER)/index.php public

clean:
	rm -f private/application/config/*
	git checkout -- private/application/config/
	@echo '# Done'
